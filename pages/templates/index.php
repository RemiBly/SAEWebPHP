<?php
include 'data.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="variables.css">
    <script src="index.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="partie__gauche">
        <div class="jenesaispas">        
        </div>
        <div class="liste__playlist">
            <div class="ajout__playlist">
                <h2><i class="fa-solid fa-list"></i> Votre bibliotèque</h2>
                <i class="fa-solid fa-plus" onclick="ajouterPlaylist()"></i>
            </div>
            <ul>
                <li>
                    <img src="images/coupDeCoeur.jpeg" alt="">
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
        <div class="recherche-approfondis">
            <button>Artistes</button>
            <button>Genre</button>
            <button>Année</button>
        </div>

        <main>
            <?php foreach ($data as $album) : ?>
                <article class="album" data-year="<?= strtolower($album['releaseYear']) ?>" data-title="<?= strtolower($album['title']) ?>" data-artist="<?= strtolower($album['by']) ?>">
                    <?php if(is_null($album['img'])){ ?>
                        <img src="./images/default.jpg" alt="">
                    <?php } else{ ?>
                        <img src="<?= $album['img'] ?>" alt="">
                    <?php } ?>
                    <div class="contenu">
                        <h3 class="test-arrow"><span><?= $album['title'] ?></span></h3>
                        <p><?= $album['releaseYear'] ?> - <?= $album['by'] ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
    </div>
</body>

</html>