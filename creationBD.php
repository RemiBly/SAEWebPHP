<?php
define('DATABASE_PATH', __DIR__ . '/BD.sqlite3');

include __DIR__ . '/config.php';
date_default_timezone_set('Europe/Paris');
try {
    $file_db = new PDO('sqlite:' . DATABASE_PATH);
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $file_db->exec("CREATE TABLE IF NOT EXISTS utilisateur( 
        ID_Utilisateur INTEGER PRIMARY KEY AUTOINCREMENT,
        Nom_Utilisateur TEXT,
        Mot_de_Passe TEXT,
        Email TEXT,
        Id_role INTEGER)");

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
    
    $file_db->exec("CREATE TABLE IF NOT EXISTS TitrePlaylist( 
        ID_Titre INTEGER,
        ID_Playlist INTEGER,
        PRIMARY KEY (ID_Titre, ID_Playlist),
        FOREIGN KEY (ID_Titre) REFERENCES Titre(ID_Titre),
        FOREIGN KEY (ID_Playlist) REFERENCES Playlist(ID_Playlist))");



} catch (PDOException $ex) {
    echo "Erreur de connexion à la base de données : " . $ex->getMessage();
}


// function ajouteArtiste($db, $nom, $biographie, $photo) {
//     $stmt = $db->prepare("INSERT INTO Artiste (Nom_Artiste, Biographie, Photo) VALUES (:nom, :biographie, :photo)");
//     $stmt->execute([
//         ':nom' => $nom,
//         ':biographie' => $biographie,
//         ':photo' => $photo
//     ]);
// }

// function ajouteAlbum($db, $titre, $annee_de_sortie, $genre, $id_artiste, $pochette) {
//     $stmt = $db->prepare("INSERT INTO Album (Titre_Album, Année_de_sortie, Genre, ID_Artiste, Pochette) VALUES (:titre, :annee, :genre, :id_artiste, :pochette)");
//     $stmt->execute([
//         ':titre' => $titre,
//         ':annee' => $annee_de_sortie,
//         ':genre' => $genre,
//         ':id_artiste' => $id_artiste,
//         ':pochette' => $pochette
//     ]);
// }

// require_once __DIR__ . '/vendor/autoload.php';
// use Symfony\Component\Yaml\Yaml;

// function traiterFichierYAML($filename, $db) {
//     $data = Yaml::parse(file_get_contents($filename));
//     foreach ($data as $entry) {
//         if (isset($entry['Nom_Artiste'])) {
//             ajouteArtiste($db, $entry['Nom_Artiste'], $entry['Biographie'], $entry['Photo']);
//         } else if (isset($entry['title'])) {
//             // Supposons que 'parent' correspond au Nom_Artiste de l'artiste pour cet album
//             $id_artiste = $db->query("SELECT ID_Artiste FROM Artiste WHERE Nom_Artiste = '{$entry['parent']}'")->fetchColumn();
//             $genre = is_array($entry['genre']) ? implode(', ', $entry['genre']) : $entry['genre'];
//             ajouteAlbum($db, $entry['title'], $entry['releaseYear'], $genre, $id_artiste, $entry['img']);
//         }
//     }
// }

// try {
//     $db = new PDO('sqlite:' . DATABASE_PATH);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//     // Assurez-vous de créer les tables Artiste et Album avant de lancer ce script

//     // Remplacer par le chemin réel de votre fichier YAML
//     $filename = 'pages/static/extrait.yml';
//     traiterFichierYAML($filename, $db);

//     echo "Les données ont été ajoutées avec succès.";

// } catch (PDOException $e) {
//     echo "Erreur : " . $e->getMessage();
// }


?>