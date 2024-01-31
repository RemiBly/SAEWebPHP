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
    <script src="../static/JS/detail-artiste.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1 class="header__title">SPOT'MUSIC</h1>

        <div class="account">
            <a href="./pages/templates/login.php"><i class="fa-regular fa-user"></i></a>
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
            <div class="liste__titre__limite3">
                <div class="titre">
                    <div class="image__int">
                        <p class="int">1</p>
                        <img src="data:image/jpeg;base64,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" alt="titre1" />
                        <div class="contenu__titre">
                            <p class="titre__musique"><span> IDGAF </span><span> - </span><span> For All the Dogs</span></p>
                        </div>
                    </div>
                    <i id="coeur1" class="fa-regular fa-heart coeur" onclick="changementCoeur('coeur1')"></i>
                </div>
            </div>
            <div class="liste__titre__limite3">
                <div class="titre">
                    <div class="image__int">
                        <p class="int">2</p>
                        <img src="data:image/jpeg;base64,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" alt="titre1" />
                        <div class="contenu__titre">
                            <p class="titre__musique"><span> Monëy so big </span><span> - </span><span> Up 2 Më</span></p>
                        </div>
                    </div>
                    <i id="coeur2" class="fa-regular fa-heart coeur" onclick="changementCoeur('coeur2')"></i>
                </div>
            </div>
            <div class="liste__titre__limite3">
                <div class="titre">
                    <div class="image__int">
                        <p class="int">3</p>
                        <img src="data:image/jpeg;base64,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" alt="titre1" />
                        <div class="contenu__titre">
                            <p class="titre__musique"><span> Talk </span><span> - </span><span> Lyfë</span></p>
                        </div>
                    </div>
                    <i id="coeur3" class="fa-regular fa-heart coeur" onclick="changementCoeur('coeur3')"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="liste__albums">
        <h2>Albums</h2>
        <div class="carousel">
            <?php foreach ($dataTest as $album) : ?>
                <article class="album album__css">
                    <?php if (is_null($album['img'])) : ?>
                        <img src="../static/images/default2.jpg" alt="">
                    <?php else : ?>
                        <img src="<?= $album['img'] ?>" alt="">
                    <?php endif; ?>
                    <div class="contenu__album">
                        <h3 class="test-arrow"><span><?= $album['title'] ?></span></h3>
                        <p><?= $album['releaseYear'] ?> - Album</p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="liste__albums similaire">
        <h2>Albums similaires</h2>
        <div class="carousel">
            <?php foreach ($dataAlbumSimilaires as $album) : ?>
                <article class="album album__css">
                    <?php if (is_null($album['img'])) : ?>
                        <img src="../static/images/default2.jpg" alt="">
                    <?php else : ?>
                        <img src="<?= $album['img'] ?>" alt="">
                    <?php endif; ?>
                    <div class="contenu__album">
                        <h3 class="test-arrow"><span><?= $album['title'] ?></span></h3>
                        <p><?= $album['releaseYear'] ?> - <?= $album['by'] ?></p>
                    </div>
                </article>
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