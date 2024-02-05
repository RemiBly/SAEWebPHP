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

    $file_db->exec("CREATE TABLE IF NOT EXISTS Titre( 
        ID_Titre INTEGER PRIMARY KEY AUTOINCREMENT,
        Nom_Titre TEXT,
        Photo TEXT,
        Duree INTEGER,
        Lien TEXT,
        ID_Album INTEGER,
        ID_Artiste INTEGER,
        FOREIGN KEY (ID_Album) REFERENCES Album(ID_Album),
        FOREIGN KEY (ID_Artiste) REFERENCES Artiste(ID_Artiste))");

    
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

    $resultat = $file_db->query("SELECT Artiste.* FROM Artiste");
    $artistes = $resultat->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $stmtPlaylists = $file_db->prepare("SELECT * FROM Playlist WHERE ID_Utilisateur = ?");
        $stmtPlaylists->execute([$userId]);
        $playlists = $stmtPlaylists->fetchAll(PDO::FETCH_ASSOC);
    }

} catch (PDOException $ex) {
    echo "Erreur de connexion à la base de données : " . $ex->getMessage();
}
?>