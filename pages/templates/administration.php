<!-- connexion administrateur
admin@spotmusic.com
admin1
-->

<?php
include '../static/data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/administration.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
    <script src="../static/JS/administration.js" defer></script>
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
        <div class="content">
            <div class="partie partie__ajout__artiste">
                <a href="./ajouter_artiste.php" class="ajouter">Ajouter un artiste</a>
            </div>
            <div class="partie partie__ajout_album">
                <a href="./ajouter_album.php" class="ajouter">Ajouter un album</a>
            </div>
            <div class="partie partie__ajout_titre">
                <a href="./ajouter_titre.php" class="ajouter">Ajouter un titre</a>
            </div>
            <div class="partie partie__statistique">
                <a href="./statistique-application.php" class="ajouter">Voir statistiques de l'application</a>
            </div>
        </div>
    </main>
</body>

</html>