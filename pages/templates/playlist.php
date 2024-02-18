<?php
include __DIR__ . '/../../creationBD.php';

// Récupérez l'ID de la playlist à partir de l'URL
$playlistId = isset($_GET['id']) ? $_GET['id'] : 0;

if ($playlistId) {
    // Préparez votre requête pour récupérer les titres de la playlist
    $stmt = $file_db->prepare("SELECT Titre.* FROM Titre
                               INNER JOIN TitrePlaylist ON Titre.ID_Titre = TitrePlaylist.ID_Titre
                               WHERE TitrePlaylist.ID_Playlist = ?");
    $stmt->execute([$playlistId]);
    $titres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Aucune playlist sélectionnée.";
    exit;
}
// récupérer l'album de chaque titre
for ($i = 0; $i < count($titres); $i++) {
    $stmt = $file_db->prepare("SELECT Album.Titre_Album, Album.Pochette FROM Album
                               INNER JOIN Titre ON Album.ID_Album = Titre.ID_Album
                               WHERE Titre.ID_Titre = ?");
    $stmt->execute([$titres[$i]['ID_Titre']]);
    $album = $stmt->fetch(PDO::FETCH_ASSOC);
    $titres[$i]["Titre_Album"] = $album["Titre_Album"];
    $titres[$i]["Pochette"] = $album["Pochette"];
}
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
    <title>Ma Playlist</title>
</head>

<body>
    <div class="header">
        <h1 class="header__title"><a href="./accueil.php"> SPOT'MUSIC</a> </h1>

        <div class="account">
            <a href="../../index.php">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
    <main>
        <h2>Titres de la Playlist</h2>
        <?php if (!empty($titres)): ?>
            <ul>
                <?php for ($i = 0; $i < count($titres); $i++): ?>
                    <div class="titre">
                        <div class="image__int">
                            <p class="int">
                                <?= $i + 1 ?>
                            </p>
                            <img src="data:image/jpeg;base64,<?= $titres[$i]['Pochette'] ?>" alt="">
                            <div class="contenu__titre">
                                <p class="titre__musique"><span>
                                        <?= $titres[$i]['Nom_Titre'] ?>
                                    </span><span> - </span><span>
                                        <?= $titres[$i]["Titre_Album"] ?? '' ?>
                                    </span></p>
                                <p class="duree">
                                    <?php
                                    $duree = $titres[$i]['Duree'];
                                    $min = floor($duree / 60);
                                    $sec = $duree % 60;
                                    echo strval($min) . ":" . (str_pad($sec, 2, '0', STR_PAD_LEFT));
                                    ?>
                                </p>
                            </div>
                        </div>
                        <i id="coeur<?= $i + 1 ?>" class="fa-solid fa-heart coeur"
                            onclick="changementCoeur('coeur<?= $i + 1 ?>', '<?= $titres[$i]['ID_Titre'] ?>')"></i>
                        <a target="_blank" href="<?= $titres[$i]["Lien"] ?>"><i class="fa-solid fa-play play"></i></a>
                    </div>
                <?php endfor; ?>
            </ul>
        <?php else: ?>
            <p>Cette playlist est vide.</p>
        <?php endif; ?>
    </main>
</body>

</html>