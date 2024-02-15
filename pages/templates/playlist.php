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
    <h2>Titres de la Playlist</h2>
    <?php if (!empty($titres)): ?>
        <ul>
            <?php foreach ($titres as $titre): ?>
                <div class="titre">
                    <div class="image__int">
                        <p class="int"><?= $i + 1 ?></p>
                        <img src="../static/images/coupDeCoeur.jpeg" alt="">
                        <div class="contenu__titre">
                            <p class="titre__musique"><span><?= $titre['Nom_Titre'] ?></span><span> - </span><span><?= $titre["Titre_Album"] ?></span></p>
                            <p class="duree"><?php
                                                $duree = $titre['Duree'];
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
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Cette playlist est vide.</p>
    <?php endif; ?>
</main>
</body>

</html>