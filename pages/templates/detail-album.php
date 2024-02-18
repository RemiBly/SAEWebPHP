<?php
session_start();
include __DIR__ . '/../../creationBD.php';

$query = "SELECT * FROM Album INNER JOIN Artiste ON Album.ID_Artiste = Artiste.ID_Artiste WHERE ID_Album = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$_GET['id']]);
$album = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT * FROM Titre WHERE ID_Album = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$_GET['id']]);
$titres = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM Playlist WHERE ID_Utilisateur = ?";
$stmt = $file_db->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT ID_Playlist FROM Playlist WHERE ID_Utilisateur = ? AND Titre_Playlist = 'Coup de coeur'";
$stmt = $file_db->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$id_coup_de_coeur = $stmt->fetch(PDO::FETCH_ASSOC)['ID_Playlist'];

$query = "SELECT * FROM Album WHERE Genre = :genre AND ID_Album != :album_id";
$stmt = $file_db->prepare($query);
$stmt->execute(array(':genre' => $album['Genre'], ':album_id' => $album['ID_Album']));
$albums_similaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/CSS/detail-album.css">
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/album.css">
    <link rel="stylesheet" href="../static/CSS/titre.css">
    <link rel="stylesheet" href="../static/CSS/artiste.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
    <link rel="stylesheet" href="../static/CSS/carousel.css">
    <script src="../static/JS/detail-album.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Album</title>
</head>

<body>
<div class="header">
        <h1 class="header__title"><a href="./accueil.php"> SPOT'MUSIC</a> </h1>

        <div class="account">
            <a href="../../index.php">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
    <main>
        <div class="album">
            <?php if (!isset($album['Pochette']) || $album['Pochette'] === "") : ?>
                <img src="./static/images/default.jpg" alt="Image par défaut">
            <?php else : ?>
                <img src="data:image/jpeg;base64,<?= $album['Pochette'] ?>" alt="Photo de <?= htmlspecialchars($album['Nom_Artiste'] ?? 'Artiste inconnu') ?>">
            <?php endif; ?>
            <div class="contenu">
                <h1><?= htmlspecialchars($album["Titre_Album"] ?? 'Titre inconnu') ?></h1>
                <p class="biographie"><?= htmlspecialchars($album["Nom_Artiste"] ?? 'Artiste inconnu') ?></p>
            </div>
        </div>
        <div class="liste__titres">
            <?php for ($i = 0; $i < count($titres); $i++) { ?>
                <div class="titre">
                    <div class="image__int">
                        <p class="int"><?= $i + 1 ?></p>
                        <img src="data:image/jpeg;base64,<?= $album['Pochette'] ?>" alt="Photo de <?= htmlspecialchars($album['Nom_Artiste'] ?? 'Artiste inconnu') ?>">
                        <div class="contenu__titre">
                            <p class="titre__musique"><span><?= $titres[$i]['Nom_Titre'] ?></span><span> - </span><span><?= $album["Titre_Album"] ?></span></p>
                            <p class="duree"><?php
                                                $duree = $titres[$i]['Duree'];
                                                $min = floor($duree / 60);
                                                $sec = $duree % 60;
                                                echo strval($min) . ":" . strval($sec);
                                                if ($sec < 10) {
                                                    echo "0";
                                                }
                                                ?></p>
                        </div>
                    </div>
                    <i id="coeur<?= $i + 1 ?>" class="fa-regular fa-heart coeur" onclick="changementCoeur('coeur<?= $i + 1 ?>', '<?= $titres[$i]['ID_Titre'] ?>')"></i>
                    <a target="_blank" href="<?php echo $titres[$i]["Lien"] ?>"><i class="fa-solid fa-play play"></i></a>
                </div>
            <?php } ?>
            <?php if (count($titres) === 0) {
                echo "<p>Aucun titre disponible</p>";
            } ?>
        </div>
        <div class="liste__albums similaire">
            <h2>Albums similaires</h2>
            
            <div class="carousel">
                <?php foreach ($albums_similaires as $albumSimilaire) : ?>
                    <?php if ($albumSimilaire['ID_Album'] !== $album['ID_Album']) : ?>
                        <!-- Afficher les détails de l'album similaire -->
                        <a href="./detail-album.php?id=<?php echo $albumSimilaire["ID_Album"] ?>" class="album album__css">
                            <!-- Afficher la pochette de l'album -->
                            <?php if (is_null($albumSimilaire['Pochette']) || $albumSimilaire['Pochette'] === "") : ?>
                                <img src="../static/images/default2.jpg" alt="">
                            <?php else : ?>
                                <img src="data:image/jpeg;base64,<?= $albumSimilaire['Pochette'] ?>" alt="">
                            <?php endif; ?>
                            <!-- Afficher le titre et l'artiste de l'album -->
                            <div class="contenu__album">
                                <h3 class="test-arrow"><span><?= $albumSimilaire['Titre_Album'] ?></span></h3>
                                <p><?= $albumSimilaire['Année_de_sortie'] ?> - <?= $albumSimilaire['Nom_Artiste'] ?></p>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </main>
    <script>
        // Définir l'ID de la playlist "Coup de cœur" pour utilisation dans le script JS
        var idCoupDeCoeur = "<?= $id_coup_de_coeur; ?>";
    </script>
</body>

</html>