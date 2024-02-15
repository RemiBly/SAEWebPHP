<?php
session_start(); // Assurez-vous que la session est bien démarrée
include __DIR__ . '/../../creationBD.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour effectuer cette action.";
    exit;
}

// Récupérez les données envoyées par la méthode POST
$action = $_POST['action'] ?? '';
$titreID = $_POST['titreID'] ?? '';
$playlistID = $_POST['playlistID'] ?? ''; // S'assurer que l'ID de la playlist est bien envoyé

// Assurez-vous que les données nécessaires sont présentes
if (empty($titreID) || empty($action) || empty($playlistID)) {
    echo "Données manquantes.";
    exit;
}

try {
    $pdo = new PDO('sqlite:' . DATABASE_PATH); // Assurez-vous que le chemin d'accès est correct
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($action == 'ajouter') {
        // Vérifiez si le titre est déjà dans la playlist pour éviter les doublons
        $checkQuery = "SELECT COUNT(*) FROM TitrePlaylist WHERE ID_Titre = ? AND ID_Playlist = ?";
        $checkStmt = $pdo->prepare($checkQuery);
        $checkStmt->execute([$titreID, $playlistID]);
        $isAlreadyAdded = $checkStmt->fetchColumn() > 0;

        if (!$isAlreadyAdded) {
            // Ajoutez le titre à la playlist de l'utilisateur
            $query = "INSERT INTO TitrePlaylist (ID_Titre, ID_Playlist) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$titreID, $playlistID]);
            echo "Titre ajouté avec succès.";
        } else {
            echo "Le titre est déjà dans la playlist.";
        }
    } elseif ($action == 'retirer') {
        // Retirez le titre de la playlist de l'utilisateur
        $query = "DELETE FROM TitrePlaylist WHERE ID_Titre = ? AND ID_Playlist = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$titreID, $playlistID]);
        echo "Titre retiré avec succès.";
    } else {
        echo "Action non reconnue.";
    }
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}
?>
