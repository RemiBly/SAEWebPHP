<?php
include __DIR__ . '/../../creationBD.php';

// Vérifiez si l'ID de l'artiste est spécifié
if (isset($_GET['id'])) {
    $id_artiste = $_GET['id'];

    try {
        $file_db->beginTransaction();

        // 1. Supprimez les titres des albums de l'artiste
        $queryTitres = "DELETE FROM Titre WHERE ID_Album IN (SELECT ID_Album FROM Album WHERE ID_Artiste = ?)";
        $stmtTitres = $file_db->prepare($queryTitres);
        $stmtTitres->execute([$id_artiste]);

        // 2. Supprimez les albums de l'artiste
        $queryAlbums = "DELETE FROM Album WHERE ID_Artiste = ?";
        $stmtAlbums = $file_db->prepare($queryAlbums);
        $stmtAlbums->execute([$id_artiste]);

        // 3. Supprimez l'artiste
        $queryArtiste = "DELETE FROM Artiste WHERE ID_Artiste = ?";
        $stmtArtiste = $file_db->prepare($queryArtiste);
        $stmtArtiste->execute([$id_artiste]);

        // Validez la transaction
        $file_db->commit();

        // Redirection vers la liste des artistes après la suppression
        header("Location: administration.php");
        exit;
    } catch (PDOException $e) {
        $file_db->rollBack();
        echo "Erreur lors de la suppression de l'artiste et de ses données liées : " . $e->getMessage();
        exit;
    }
} else {
    echo "Aucun ID d'artiste spécifié.";
    exit;
}
?>
