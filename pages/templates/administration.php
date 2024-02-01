<!-- connexion administrateur
admin@spotmusic.com
admin1 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/administration.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
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
                <div class="contenu">
                    <h2>Ajouter un nouvel Artiste</h2>
                    <form action="ajouter_artiste.php" method="post">
                        <label for="nom_artiste">Nom de l'artiste:</label><br>
                        <input type="text" id="nom_artiste" name="nom_artiste"><br>

                        <label for="biographie">Biographie:</label><br>
                        <textarea id="biographie" name="biographie"></textarea><br>

                        <label for="photo">Photo (URL):</label><br>
                        <input type="text" id="photo" name="photo"><br>

                        <input type="submit" value="Ajouter l'Artiste">
                    </form>
                </div>
            </div>
            <div class="partie partie__ajout_album">
                <div class="contenu">
                    <h2>Ajouter un nouvel Album</h2>
                    <form action="ajouter_album.php" method="post">
                        <label for="titre_album">Titre de l'album:</label><br>
                        <input type="text" id="titre_album" name="titre_album"><br>

                        <label for="annee_sortie">Année de sortie:</label><br>
                        <input type="number" id="annee_sortie" name="annee_sortie"><br>

                        <label for="genre">Genre:</label><br>
                        <input type="text" id="genre" name="genre"><br>

                        <label for="id_artiste">ID de l'artiste:</label><br>
                        <input type="number" id="id_artiste" name="id_artiste"><br>

                        <label for="pochette">Pochette (URL):</label><br>
                        <input type="text" id="pochette" name="pochette"><br>

                        <input type="submit" value="Ajouter l'Album">
                    </form>
                </div>
            </div>
            <div class="partie partie__statistique"></div>
        </div>
    </main>
</body>

</html>