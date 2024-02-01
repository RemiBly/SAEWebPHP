<!-- connexion administrateur
admin@spotmusic.com
admin1
-->

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
                        <label for="nom_artiste">Nom de l'artiste</label><br>
                        <input type="text" id="nom_artiste" name="nom_artiste" placeholder="Ex : Yeat"><br>

                        <label for="biographie">Biographie</label><br>
                        <textarea id="biographie" name="biographie" placeholder="Ex : Reconnu dans le monde entier par ..."></textarea><br>

                        <label for="photo">Photo</label><br>
                        <input type="text" id="photo" name="photo" placeholder="Lien image (URL)"><br>

                        <div class="center__btn">
                            <input type="submit" value="Ajouter l'Artiste">
                        </div>
                    </form>
                </div>
            </div>
            <div class="partie partie__ajout_album">
                <div class="contenu">
                    <h2>Ajouter un nouvel Album</h2>
                    <form action="ajouter_album.php" method="post">
                        <label for="titre_album">Titre de l'album</label><br>
                        <input type="text" id="titre_album" name="titre_album" placeholder="Ex : Lyfe"><br>

                        <label for="annee_sortie">Année de sortie</label><br>
                        <input type="number" id="annee_sortie" name="annee_sortie" placeholder="Ex : 2024"><br>

                        <label for="genre">Genre</label><br>
                        <input type="text" id="genre" name="genre" placeholder="Ex : Rap"><br>

                        <label for="id_artiste">ID de l'artiste</label><br>
                        <input type="number" id="id_artiste" name="id_artiste"><br>

                        <label for="pochette">Pochette (URL)</label><br>
                        <input type="text" id="pochette" name="pochette" placeholder="Lien image (URL)"><br>

                        <div class="center__btn">
                            <input type="submit" value="Ajouter l'Album">
                        </div>
                    </form>
                </div>
            </div>
            <div class="partie partie__statistique">
                <div class="contenu">
                    <h2>Statistiques</h2>
                    <div class="statistique__container">
                        <div class="statistique">
                            <h3>Nombre d'artistes</h3>
                            <p>25742</p>
                        </div>
                        <div class="statistique">
                            <h3>Nombre d'albums</h3>
                            <p>4524</p>
                        </div>
                        <div class="statistique">
                            <h3>Nombre de titres</h3>
                            <p>452</p>
                        </div>
                        <div class="statistique">
                            <h3>Nombre d'utilisateurs</h3>
                            <p>42</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>