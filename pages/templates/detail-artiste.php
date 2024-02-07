<?php
include '../static/data.php';
include './creationBD.php';
$query = "SELECT * FROM Artiste WHERE ID_Artiste = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$_GET['id']]);
$artiste = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * FROM Titre INNER JOIN Album ON Titre.ID_Album = Album.ID_Album WHERE Titre.ID_Artiste = ? ORDER BY Duree DESC LIMIT 5";
$stmt = $file_db->prepare($query);
$stmt->execute([$artiste['ID_Artiste']]);
$titresArtiste = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM Album WHERE ID_Artiste = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$artiste['ID_Artiste']]);
$albumsArtiste = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT DISTINCT Artiste.ID_Artiste, Artiste.Nom_Artiste, Artiste.Photo, Album.Genre FROM Album INNER JOIN Artiste ON Album.ID_Artiste = Artiste.ID_Artiste WHERE Album.Genre IN (SELECT Genre FROM Album WHERE ID_Artiste = ?) AND Artiste.ID_Artiste != ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$artiste['ID_Artiste'], $artiste['ID_Artiste']]);
$artistesSimilaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <script src="../static/JS/detail-artiste.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Document</title>
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
        <img src="<?php echo $artiste['Photo'] ?>" alt="img">
        <div>
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
                            <img src="<?= $titresArtiste[$i]['Photo'] ?>" alt="titre<?= $i + 1 ?>" />
                            <div class="contenu__titre">
                                <p class="titre__musique"><span><?= $titresArtiste[$i]['Nom_Titre'] ?></span><span> - </span><span><?= $titresArtiste[$i]['Titre_Album'] ?></span></p>
                                <p class="duree"><?php echo $titresArtiste[$i]['Duree'] ?></p>
                            </div>
                        </div>
                        <i id="coeur<?= $i + 1 ?>" class="fa-regular fa-heart coeur" onclick="changementCoeur('coeur<?= $i + 1 ?>')"></i>
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
                            <?php if (is_null($artiste['Photo']) || $artiste['Photo']==="") : ?>
                                <img src="../static/images/default2.jpg" alt="">
                            <?php else : ?>
                                <img src="<?= $artiste['Photo'] ?>" alt="">
                            <?php endif; ?>
                        <?php else : ?>
                            <img src="<?= $album['Pochette'] ?>" alt="">
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
                        <img src="<?= $artisteSimilaire['Photo'] ?>" alt="">
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
</body>

</html>