<?php
define('DATABASE_PATH', __DIR__ . '/BD.sqlite3');


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

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// Chemin vers le répertoire contenant vos fichiers YML ou un tableau des chemins de fichiers
$directoryPath = __DIR__ . '/pages/static/YML';
$files = scandir($directoryPath);

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'yml') {
        $filePath = $directoryPath . '/' . $file;
        $data = Yaml::parseFile($filePath);

        // Détermination du type basée sur le nom du fichier
        if (strpos($file, 'artiste') !== false) {
            $type = 'artiste';
        } elseif (strpos($file, 'album') !== false) {
            $type = 'album';
        } elseif (strpos($file, 'titre') !== false) {
            $type = 'titre';
        } else {
            // Type par défaut ou gestion d'erreur
            continue; // Passe au fichier suivant si aucun type reconnu
        }

        insertDataIntoDatabase($file_db, $data, $type);
    }
}

function insertDataIntoDatabase($pdo, $data, $type) {
    try {
        // Préparation des requêtes de vérification pour chaque type
        $stmtCheckArtiste = $pdo->prepare("SELECT COUNT(*) FROM Artiste WHERE Nom_Artiste = :Nom_Artiste");
        $stmtCheckAlbum = $pdo->prepare("SELECT COUNT(*) FROM Album WHERE Titre_Album = :Titre_Album");
        $stmtCheckTitre = $pdo->prepare("SELECT COUNT(*) FROM Titre WHERE Nom_Titre = :Nom_Titre");

        if ($type === 'artiste') {
            $stmtInsertArtiste = $pdo->prepare("INSERT INTO Artiste (Nom_Artiste, Biographie, Photo) VALUES (:Nom_Artiste, :Biographie, :Photo)");
            foreach ($data as $item) {
                $stmtCheckArtiste->execute([':Nom_Artiste' => $item['Nom_Artiste']]);
                if ($stmtCheckArtiste->fetchColumn() == 0) {
                    $binaryData = file_get_contents(__DIR__ . '/pages/static/images/' . $item['Photo']);
                    $base64Data = base64_encode($binaryData);
                    $stmtInsertArtiste->execute([
                        ':Nom_Artiste' => $item['Nom_Artiste'],
                        ':Biographie' => $item['Biographie'],
                        ':Photo' => $base64Data
                    ]);
                }
            }
        } elseif ($type === 'album') {
            $stmtInsertAlbum = $pdo->prepare("INSERT INTO Album (Titre_Album, Année_de_sortie, Genre, ID_Artiste, Pochette) VALUES (:Titre_Album, :Année_de_sortie, :Genre, :ID_Artiste, :Pochette)");
            foreach ($data as $item) {
                $stmtCheckAlbum->execute([':Titre_Album' => $item['Titre_Album']]);
                if ($stmtCheckAlbum->fetchColumn() == 0) {
                    $binaryData = file_get_contents(__DIR__ . '/pages/static/images/' . $item['Pochette']);
                    $base64Data = base64_encode($binaryData);
                    $stmtInsertAlbum->execute([
                        ':Titre_Album' => $item['Titre_Album'],
                        ':Année_de_sortie' => $item['Année_de_sortie'],
                        ':Genre' => $item['Genre'],
                        ':ID_Artiste' => $item['ID_Artiste'],
                        ':Pochette' => $base64Data
                    ]);
                }
            }
        } elseif ($type === 'titre') {
            $stmtInsertTitre = $pdo->prepare("INSERT INTO Titre (Nom_Titre, Photo, Duree, Lien, ID_Album, ID_Artiste) VALUES (:Nom_Titre, :Photo, :Duree, :Lien, :ID_Album, :ID_Artiste)");
            foreach ($data as $item) {
                $stmtCheckTitre->execute([':Nom_Titre' => $item['Nom_Titre']]);
                if ($stmtCheckTitre->fetchColumn() == 0) {
                    $binaryData = file_get_contents(__DIR__ . '/pages/static/images/' . $item['Photo']);
                    echo
                    $stmtInsertTitre->execute([
                        ':Nom_Titre' => $item['Nom_Titre'],
                        ':Photo' => $binaryData,
                        ':Duree' => $item['Duree'],
                        ':Lien' => $item['Lien'],
                        ':ID_Album' => $item['ID_Album'],
                        ':ID_Artiste' => $item['ID_Artiste']
                    ]);
                }
            }
        }
    } catch (PDOException $e) {
        echo "Erreur d'insertion dans la base de données : " . $e->getMessage();
    }
}
?>
