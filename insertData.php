<?php

// exercutez ce script pour insérer les données YML dans la base de données avec la commande suivante: php insertData.php 
// ça va supprimer la bd exsistante, recréer la base de données et insérer les données YML dans la nouvelle bd

if (!defined('DATABASE_PATH')) {
    define('DATABASE_PATH', __DIR__ . '/BD.sqlite3');
}


// Supprimez le fichier de base de données existant
if (file_exists(DATABASE_PATH)) {
    unlink(DATABASE_PATH);
}

// Incluez le script de création de la base de données
require_once 'creationBD.php'; // Assurez-vous que ce fichier ne recrée pas les tables si elles existent déjà

// Incluez l'autoload pour utiliser Yaml
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// Chemin vers le répertoire contenant vos fichiers YML
$directoryPath = __DIR__ . '/pages/static/YML';
$files = scandir($directoryPath);

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'yml') {
        $filePath = $directoryPath . '/' . $file;
        $data = Yaml::parseFile($filePath);

        // Déterminez le type basé sur le nom du fichier
        if (strpos($file, 'artiste') !== false) {
            $type = 'artiste';
        } elseif (strpos($file, 'album') !== false) {
            $type = 'album';
        } elseif (strpos($file, 'titre') !== false) {
            $type = 'titre';
        } else {
            continue; // Passe au fichier suivant si aucun type reconnu
        }

        insertDataIntoDatabase($file_db, $data, $type);
    }
}

$adminAdded = false;
function insertDataIntoDatabase($pdo, $data, $type) {
    global $adminAdded;
    try {
        // Préparation des requêtes de vérification pour chaque type
        $stmtCheckArtiste = $pdo->prepare("SELECT COUNT(*) FROM Artiste WHERE Nom_Artiste = :Nom_Artiste");
        $stmtCheckAlbum = $pdo->prepare("SELECT COUNT(*) FROM Album WHERE Titre_Album = :Titre_Album");
        $stmtCheckTitre = $pdo->prepare("SELECT COUNT(*) FROM Titre WHERE Nom_Titre = :Nom_Titre");
        if(!$adminAdded) {
            $motDePasseAdmin = password_hash('admin1', PASSWORD_DEFAULT);
            $stmtInsertUtilisateur = $pdo->prepare("INSERT INTO utilisateur (Nom_Utilisateur, Mot_de_Passe, Email, Id_role) VALUES ('admin', :motDePasseAdmin, 'admin@spotmusic.com', 2)");
            $stmtInsertUtilisateur->bindParam(':motDePasseAdmin', $motDePasseAdmin);
            $stmtInsertUtilisateur->execute();
            $adminAdded = true;
        }


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
                    $base64Data = base64_encode($binaryData);
                    $stmtInsertTitre->execute([
                        ':Nom_Titre' => $item['Nom_Titre'],
                        ':Photo' => $base64Data,
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
