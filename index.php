<?php
include './pages/static/data.php';
$selected = isset($_GET['searchArtist']) && $_GET['searchArtist'] == '1' ? 'artiste' : 'album';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pages/static/CSS/index.css">
    <link rel="stylesheet" href="./pages/static/CSS/variables.css">
    <link rel="stylesheet" href="./pages/static/CSS/header.css">
    <script src="./pages/static/JS/index.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1 class="header__title"> SPOT'MUSIC</h1>

        <div class="account">
            <a href="./pages/templates/login.php"><i class="fa-regular fa-user"></i></a>
        </div>
    </div>

    <div class="main__application">
        <div class="partie__gauche">
            <div class="jenesaispas">
                <div class="compte">
                    <h2>Bienvenue, Kris</h2>
                    <img class="photo__profil" src="./pages/static/images/image-compte.jpg" alt="">
                </div>
                <div class="recherche__artiste__album">
                    <h3><a href="?searchArtist=1"><i class="fa-solid fa-magnifying-glass"></i> Rechercher un artiste</a></h3>
                    <h3><a href="?searchArtist=0"><i class="fa-solid fa-magnifying-glass"></i> Rechercher un album</a></h3>
                </div>      
            </div>
            <div class="liste__playlist">
                <div class="ajout__playlist">
                    <h2><i class="fa-solid fa-list"></i> Votre bibliotèque</h2>
                    <i class="fa-solid fa-plus" onclick="ajouterPlaylist()"></i>
                </div>
                <ul>
                    <li>
                        <img src="./pages/static/images/coupDeCoeur.jpeg" alt="">
                        <p>Coup de cœur</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="partie__droite">
            <div class="barre__recherche">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input class="barre__recherche__input" placeholder="Que souhaitez-vous rechercher ?" type="text" id="search" oninput="filterResults(event)" onkeypress="handleKeyPress(event)">
                <i id="croixSelector" class="fa-solid" onclick="resetInputValue()"></i>
            </div>

            <main>
                <?php if ($selected === 'artiste') : ?>
                    <?php foreach ($dataArtistes as $artiste) : ?>
                        <a href="./pages/templates/detail-artiste.php" class="album artiste" data-name="<?= strtolower($artiste['nom']) ?>">
                            <?php if (is_null($artiste['img'])) : ?>
                                <img src="./pages/static/images/default.jpg" alt="">
                            <?php else : ?>
                                <img src="<?= $artiste['img'] ?>" alt="">
                            <?php endif; ?>
                            <div class="contenu">
                                <h3 class="test-arrow"><span><?= $artiste['nom'] ?></span></h3>
                                <p>Artiste</p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($dataAlbum as $album) : ?>
                        <a href="./pages/templates/detail-album.php" class="album album__css" data-year="<?= strtolower($album['releaseYear']) ?>" data-title="<?= strtolower($album['title']) ?>" data-artist="<?= strtolower($album['by']) ?>">
                            <?php if (is_null($album['img'])) : ?>
                                <img src="./pages/static/images/default2.jpg" alt="">
                            <?php else : ?>
                                <img src="<?= $album['img'] ?>" alt="">
                            <?php endif; ?>
                            <div class="contenu__album">
                                <h3 class="test-arrow"><span><?= $album['title'] ?></span></h3>
                                <p><?= $album['releaseYear'] ?> - <?= $album['by'] ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </main>
        </div>
    </div>
</body>

</html>