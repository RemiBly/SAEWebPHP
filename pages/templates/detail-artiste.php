<?php

include __DIR__ . '/../../creationBD.php';

session_start();

$query = "SELECT * FROM Artiste WHERE ID_Artiste = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$_GET['id']]);
$artiste = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * FROM Titre INNER JOIN Album ON Titre.ID_Album = Album.ID_Album WHERE Titre.ID_Artiste = ? ORDER BY Duree DESC LIMIT 3";
$stmt = $file_db->prepare($query);
$stmt->execute([$artiste['ID_Artiste']]);
$titresArtiste = $stmt->fetchAll(PDO::FETCH_ASSOC);

//récupérer l'id de la playlist coup de coeur
$query = "SELECT ID_Playlist FROM Playlist WHERE ID_Utilisateur = ? AND Titre_Playlist = 'Coup de coeur'";
$stmt = $file_db->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$id_coup_de_coeur = $stmt->fetch(PDO::FETCH_ASSOC)['ID_Playlist'];

// ajouter à chaque titre un boléen qui montre s'il est dans la playlist coup de coeur
foreach ($titresArtiste as $key => $titre) {
    $query = "SELECT * FROM TitrePlaylist WHERE ID_Titre = ? AND ID_Playlist = ?";
    $stmt = $file_db->prepare($query);
    $stmt->execute([$titre['ID_Titre'], $id_coup_de_coeur]);
    $titresArtiste[$key]['Coup_de_coeur'] = $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
}

$query = "SELECT * FROM Album WHERE ID_Artiste = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$artiste['ID_Artiste']]);
$albumsArtiste = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT DISTINCT Artiste.ID_Artiste, Artiste.Nom_Artiste, Artiste.Photo, Album.Genre FROM Album INNER JOIN Artiste ON Album.ID_Artiste = Artiste.ID_Artiste WHERE Album.Genre IN (SELECT Genre FROM Album WHERE ID_Artiste = ?) AND Artiste.ID_Artiste != ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$artiste['ID_Artiste'], $artiste['ID_Artiste']]);
$artistesSimilaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM Playlist WHERE ID_Utilisateur = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/CSS/detail-artiste.css">
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/album.css">
    <link rel="stylesheet" href="../static/CSS/titre.css">
    <link rel="stylesheet" href="../static/CSS/artiste.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
    <link rel="stylesheet" href="../static/CSS/carousel.css">
    <script src="../static/JS/detail-album.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Artiste</title>
</head>

<body>
    <div class="header">
        <h1 class="header__title"><a href="./accueil.php"> SPOT'MUSIC</a> </h1>

        <div class="account">
            <a href="../../index.php">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
    <main>
    <div class="artiste">
        <img src="data:image/jpeg;base64,<?= $artiste['Photo'] ?>" alt="Photo de <?= htmlspecialchars($artiste['Nom_Artiste']) ?>"> 
        <div class="contenu">
            <h1><?php echo $artiste['Nom_Artiste'] ?></h1>
            <p><?php echo $artiste['Biographie'] ?></p>
        </div>
    </div>
        <div class="liste__titre">
            <h2>Titres phares</h2>
            <?php if (count($titresArtiste) > 0) : ?>
            <div class="contenu__liste__titres">
                <?php for ($i = 0; $i < count($titresArtiste); $i++) { ?>
                    <div class="titre">
                        <div class="image__int">
                            <p class="int"><?= $i + 1 ?></p>
                            <img src="data:image/jpeg;base64,<?= $artiste['Photo'] ?>" alt="">
                            <div class="contenu__titre">
                                <p class="titre__musique"><span><?= $titresArtiste[$i]['Nom_Titre'] ?></span><span> - </span><span><?= $titresArtiste[$i]['Titre_Album'] ?></span></p>
                                <p class="duree"><?php
                                                $duree = $titresArtiste[$i]['Duree'];
                                                $min = floor($duree / 60);
                                                $sec = $duree % 60;
                                                echo strval($min) . ":" . (str_pad($sec, 2, '0', STR_PAD_LEFT));
                                                ?></p>
                            </div>
                        </div>
                        <i id="coeur<?= $i + 1 ?>" class="<?php if ($titresArtiste[$i]['Coup_de_coeur']) {echo "fa-solid";} else {echo "fa-regular";} ?> fa-heart coeur" onclick="changementCoeur('coeur<?= $i + 1 ?>', '<?= $titresArtiste[$i]['ID_Titre'] ?>')"></i>
                        <i class="fa-solid fa-plus" onclick="ajouterAPlaylist(<?= $titresArtiste[$i]['ID_Titre'] ?>)"></i>
                        <a target="_blank" href="<?php echo $titresArtiste[$i]["Lien"] ?>"><i class="fa-solid fa-play play"></i></a>
                    </div>
                <?php } ?>
            </div>
            <?php else: ?>
                <p>Cet artiste n'a pas de titres</p>
            <?php endif; ?>
        </div>
    <div class="liste__albums">
        <h2>Albums</h2>
        <div class="carousel">
            <?php foreach ($albumsArtiste as $album) : ?>
                <a href="./detail-album.php?id=<?php echo $album["ID_Album"] ?>" class="album album__css">
                        <?php if (is_null($album['Pochette']) || $album['Pochette']==="") : ?>
                        <img src="../static/images/default.jpg" alt="Pochette par défaut">
                        <?php else : ?>
                            <img src="data:image/jpeg;base64,<?= $album['Pochette'] ?>" alt="Pochette d'album de <?= htmlspecialchars($album['Titre_Album']) ?>">
                        <?php endif; ?>
                        <div class="contenu__album">
                            <p><?= $album['Année_de_sortie'] ?> - <?= $album['Titre_Album'] ?></p>
                        </div>
                    </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="artistes__similaires similaire">
        <h2>Artistes similaires</h2>
        <div class="carousel">
            <?php foreach ($artistesSimilaires as $artisteSimilaire) : ?>
                <a href="./detail-artiste.php?id=<?php echo $artisteSimilaire["ID_Artiste"] ?>" class="album artiste__similaire" data-name="<?= strtolower($artisteSimilaire['Nom_Artiste']) ?>">
                    <?php if (is_null($artisteSimilaire['Photo'])) : ?>
                        <img src="./pages/static/images/default.jpg" alt="">
                    <?php else : ?>
                        <img src="data:image/jpeg;base64,<?= $artisteSimilaire['Photo'] ?>" alt="Pochette d'album de <?= htmlspecialchars($album['Titre_Album']) ?>">
                    <?php endif; ?>
                    <div class="contenu__artiste__similaire">
                        <h3 class="test-arrow"><span><?= $artisteSimilaire['Nom_Artiste'] ?></span></h3>
                        <p>Artiste</p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    </main>
    <script>
        // Définir l'ID de la playlist "Coup de cœur" pour utilisation dans le script JS
        var idCoupDeCoeur = "<?= $id_coup_de_coeur; ?>";
        <?php echo "var playlists = " . json_encode($playlists) . ";"; ?>
    </script>
</body>

</html>