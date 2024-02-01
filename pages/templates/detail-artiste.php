<?php
include '../static/data.php';
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
        <img src="https://mnrepublic.com/wp-content/uploads/2022/04/MNR-Yeat.jpg" alt="artiste1" />
        <div class="contenu">
            <h1>{{artiste[nom]}}</h1>
            <p class="biographie">{{artiste[biographie]}}</p>
        </div>
    </div>
    <div class="liste__titre">
        <h2>Titres phares</h2>
        <div class="contenu__liste__titres">
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <div class="titre">
                    <div class="image__int">
                        <p class="int"><?= $i + 1 ?></p>
                        <img src="<?= $dataTitres[$i]['image'] ?>" alt="titre<?= $i + 1 ?>" />
                        <div class="contenu__titre">
                            <p class="titre__musique"><span><?= $dataTitres[$i]['nom'] ?></span><span> - </span><span><?= $dataTitres[$i]['album'] ?></span></p>
                            <p class="duree"><?= $dataTitres[$i]['duree'] ?></p>
                        </div>
                    </div>
                    <i id="coeur<?= $i + 1 ?>" class="fa-regular fa-heart coeur" onclick="changementCoeur('coeur<?= $i + 1 ?>')"></i>
                    <a target="_blank" href="https://www.youtube.com/watch?v=zTr9Iffkzjg&list=RD4EKEmQtmitc&index=5"><i class="fa-solid fa-play play"></i></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="liste__albums">
        <h2>Albums</h2>
        <div class="carousel">
            <?php foreach ($dataTest as $album) : ?>
                <a href="../templates/detail-album.php" class="album album__css">
                    <?php if (is_null($album['img'])) : ?>
                        <img src="../static/images/default2.jpg" alt="">
                    <?php else : ?>
                        <img src="<?= $album['img'] ?>" alt="">
                    <?php endif; ?>
                    <div class="contenu__album">
                        <h3 class="test-arrow"><span><?= $album['title'] ?></span></h3>
                        <p><?= $album['releaseYear'] ?> - Album</p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="liste__albums similaire">
        <h2>Albums similaires</h2>
        <div class="carousel">
            <?php foreach ($dataAlbumSimilaires as $album) : ?>
                <a href="../templates/detail-album.php" class="album album__css">
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
    <div class="artistes__similaires similaire">
        <h2>Artistes similaires</h2>
        <div class="carousel">
            <?php foreach ($dataArtistes as $artiste) : ?>
                <a href="#" class="album artiste__similaire" data-name="<?= strtolower($artiste['nom']) ?>">
                    <?php if (is_null($artiste['img'])) : ?>
                        <img src="./pages/static/images/default.jpg" alt="">
                    <?php else : ?>
                        <img src="<?= $artiste['img'] ?>" alt="">
                    <?php endif; ?>
                    <div class="contenu__artiste__similaire">
                        <h3 class="test-arrow"><span><?= $artiste['nom'] ?></span></h3>
                        <p>Artiste</p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    </main>
</body>

</html>