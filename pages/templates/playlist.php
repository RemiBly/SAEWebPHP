<?php
include '../static/data.php';
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
            <a href="./pages/templates/login.php"><i class="fa-regular fa-user"></i></a>
        </div>
    </div>
    <main>
        <div class="album">
            <img src="../static/images/coupDeCoeur.jpeg" alt="artiste1" />
            <div class="contenu">
                <h1>{{album[nom]}}</h1>
                <p class="biographie">{{artiste[nom]}}</p>
            </div>
        </div>
        <div class="liste__titres">
            <?php for ($i = 0; $i < count($dataTitres); $i++) { ?>
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
    </main>
</body>

</html>