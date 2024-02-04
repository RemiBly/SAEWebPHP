<?php
include __DIR__ . '/../../configBD.php';

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];

    // Récupération des informations de l'album
    $stmt = $file_db->prepare("SELECT * FROM Album WHERE ID_Album = ?");
    $stmt->execute([$albumId]);
    $album = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupération des titres de l'album
    $stmtTitres = $file_db->prepare("SELECT * FROM Titre WHERE ID_Album = ?");
    $stmtTitres->execute([$albumId]);
    $dataTitres = $stmtTitres->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="album">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png" alt="artiste1" />
            <div class="contenu">
                <h1>{{album[nom]}}</h1>
                <p class="biographie">{{artiste[nom]}}</p>
            </div>
        </div>
        <div class="liste__titres">
            <?php if (!empty($dataTitres)): ?>
                <?php foreach ($dataTitres as $titre): ?>
                    <div class="titre">
                        <div class="image__int">
                            <p class="int"><?= htmlspecialchars($titre['Duree']) ?></p> <!-- Utilisez les vraies données ici -->
                            <img src="<?= htmlspecialchars($titre['Photo']) ?>" alt="titre" />
                            <div class="contenu__titre">
                                <p class="titre__musique"><span><?= htmlspecialchars($titre['Nom_Titre']) ?></span></p>
                                <p class="duree"><?= htmlspecialchars($titre['Duree']) ?>s</p> <!-- Adaptez selon le format de votre durée -->
                            </div>
                        </div>
                        <!-- Exemple de lien vers YouTube, adaptez selon vos données -->
                        <a target="_blank" href="<?= htmlspecialchars($titre['Lien']) ?>"><i class="fa-solid fa-play play"></i></a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun titre trouvé pour cet album.</p>
            <?php endif; ?>
        </div>
        <div class="liste__albums similaire">
        <h2>Albums similaires</h2>
        <div class="carousel">
            <?php foreach ($dataAlbumSimilaires as $album) : ?>
                <a href="#" class="album album__css">
                    <?php if (is_null($album['img'])) : ?>
                        <img src="../static/images/default2.jpg" alt="">
                    <?php else : ?>
                        <img src="<?= $album['img'] ?>" alt="">
                    <?php endif; ?>
                    <div class="contenu__album">
                        <h3 class="test-arrow"><span><?= $album['title'] ?></span></h3>
                        <p><?= $album['releaseYear'] ?> - <?= $album['by'] ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    </main>
</body>

</html>