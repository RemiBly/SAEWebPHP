<?php
date_default_timezone_set('Europe/Paris');
try {
    $file_db = new PDO('sqlite:BD.sqlite3');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $file_db->exec("CREATE TABLE IF NOT EXISTS utilisateur( 
        ID_Utilisateur INTEGER PRIMARY KEY AUTOINCREMENT,
        Nom_Utilisateur TEXT,
        Mot_de_Passe TEXT,
        Email TEXT)");

    $file_db->exec("CREATE TABLE IF NOT EXISTS Playlist( 
        ID_Playlist INTEGER PRIMARY KEY AUTOINCREMENT,
        Titre_Playlist TEXT,
        ID_Utilisateur INTEGER,
        FOREIGN KEY (ID_Utilisateur) REFERENCES utilisateur(ID_Utilisateur))");

    $file_db->exec("CREATE TABLE IF NOT EXISTS Artiste( 
        ID_Artiste INTEGER PRIMARY KEY AUTOINCREMENT,
        Nom_Artiste TEXT,
        Biographie TEXT,
        Photo TEXT)");
    
    $file_db->exec("CREATE TABLE IF NOT EXISTS Album(
        ID_Album INTEGER PRIMARY KEY AUTOINCREMENT,
        Titre_Album TEXT,
        Année_de_sortie INTEGER,
        Genre TEXT,
        ID_Artiste INTEGER,
        Pochette TEXT,
        FOREIGN KEY (ID_Artiste) REFERENCES Artiste(ID_Artiste))");
    
    $file_db->exec("CREATE TABLE IF NOT EXISTS NoteAlbum( 
        ID_Album INTEGER,
        ID_Utilisateur INTEGER,
        Note INTEGER,
        PRIMARY KEY (ID_Album, ID_Utilisateur),
        FOREIGN KEY (ID_Album) REFERENCES Album(ID_Album),
        FOREIGN KEY (ID_Utilisateur) REFERENCES utilisateur(ID_Utilisateur))");

    $resultat = $file_db->query("SELECT Album.*, Artiste.Nom_Artiste FROM Album INNER JOIN Artiste ON Album.ID_Artiste = Artiste.ID_Artiste");
    $albums = $resultat->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $ex) {
    echo "Erreur de connexion à la base de données : " . $ex->getMessage();
}
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
            <a href="ajouter_artiste.html" class="ajouter-artiste-btn">Ajouter un Artiste</a>
            <a href="ajouter_album.html" class="ajouter-album-btn">Ajouter un Album</a>
        </div>

        <main>
            <?php foreach ($albums as $album) : ?>
                <article class="album" data-title="<?= strtolower($album['Titre_Album']) ?>" data-year="<?= strtolower($album['Année_de_sortie']) ?>" data-artist="<?= strtolower($album['Titre_Album']) ?>">
                    <img src="<?= !empty($album['Pochette']) ? $album['Pochette'] : './images/default.jpg' ?>" alt="Pochette d'album">
                    <div class="contenu">
                        <h3 class="test-arrow"><span><?= $album['Titre_Album'] ?></span></h3>
                        <p><?= $album['Année_de_sortie'] ?> - <?= $album['Nom_Artiste'] ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
    </div>
</body>

</html>