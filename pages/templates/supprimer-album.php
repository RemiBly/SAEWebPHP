<?php
include __DIR__ . '/../../creationBD.php';

if (isset($_GET['id'])) {
    $id_album = $_GET['id'];

    try {
        $file_db->beginTransaction();

        // 1. Supprimez les titres de l'album
        $queryTitres = "DELETE FROM Titre WHERE ID_Album = ?";
        $stmtTitres = $file_db->prepare($queryTitres);
        $stmtTitres->execute([$id_album]);

        // 2. Supprimez l'album
        $queryAlbum = "DELETE FROM Album WHERE ID_Album = ?";
        $stmtAlbum = $file_db->prepare($queryAlbum);
        $stmtAlbum->execute([$id_album]);

        // Validez la transaction
        $file_db->commit();

        // Redirection vers la liste des albums après la suppression
        header("Location: administration.php");
        exit;
    } catch (PDOException $e) {
        $file_db->rollBack();
        echo "Erreur lors de la suppression de l'album et de ses titres : " . $e->getMessage();
        exit;
    }
} else {
    echo "Aucun ID d'album spécifié.";
    exit;
}
?>
