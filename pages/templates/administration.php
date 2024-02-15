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
                <a href="./CRUDartiste.php" class="ajouter">Liste des artistes</a>
            </div>
            <div class="partie partie__ajout_album">
                <a href="./CRUDalbum.php" class="ajouter">Liste des albums</a>
            </div>
        </div>
    </main>
</body>

</html>