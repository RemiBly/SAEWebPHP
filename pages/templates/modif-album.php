<?php
include __DIR__ . '/../../creationBD.php';

// Vérifiez si l'ID de l'album a été passé à la page
if (isset($_GET['id'])) {
    $id_album = $_GET['id'];

    // Récupérez les informations de l'album à partir de la base de données
    $query = "SELECT * FROM Album WHERE ID_Album = ?";
    $stmt = $file_db->prepare($query);
    $stmt->execute([$id_album]);
    $album = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$album) {
        echo "Album non trouvé";
        exit;
    }
} else {
    echo "Aucun ID d'album spécifié.";
    exit;
}

if (isset($_POST['submit'])) {
    // Récupérez les données du formulaire
    $titre_album = $_POST['titre_album'];
    $id_artiste = $_POST['id_artiste'];
    $annee_de_sortie = $_POST['annee_de_sortie'];
    $genre = $_POST['genre'];

    // Traitement de la nouvelle pochette téléchargée
    if (isset($_FILES['pochette']) && $_FILES['pochette']['error'] == 0) {
        $tmpName = $_FILES['pochette']['tmp_name'];
        $pochetteContent = file_get_contents($tmpName);
        $pochette = base64_encode($pochetteContent);
    } else {
        // Si pas de nouvelle pochette, conserver l'ancienne
        $pochette = $album['Pochette'];
    }

    // Mettez à jour l'album dans la base de données
    $query = "UPDATE Album SET Titre_Album = ?, ID_Artiste = ?, Année_de_sortie = ?, Genre = ?, Pochette = ? WHERE ID_Album = ?";
    $stmt = $file_db->prepare($query);
    $result = $stmt->execute([$titre_album, $id_artiste, $annee_de_sortie, $genre, $pochette, $id_album]);

    if ($result) {
        header("Location: CRUDalbum.php");
        exit;
    } else {
        echo "<p>Erreur lors de la mise à jour de l'album.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Album</title>
    <!-- Styles ici -->
</head>
<body>
<div class="contenu">
    <h2>Modifier l'Album</h2>
    <form action="modif-album.php?id=<?= htmlspecialchars($id_album) ?>" method="post" enctype="multipart/form-data">
        <label for="titre_album">Titre de l'album</label>
        <input type="text" id="titre_album" name="titre_album" value="<?= htmlspecialchars($album['Titre_Album']) ?>" required><br>

        <label for="id_artiste">Artiste</label>
        <input type="text" id="id_artiste" name="id_artiste" value="<?= htmlspecialchars($album['ID_Artiste']) ?>" required><br>

        <label for="annee_de_sortie">Année de sortie</label>
        <input type="number" id="annee_de_sortie" name="annee_de_sortie" value="<?= htmlspecialchars($album['Année_de_sortie']) ?>" required><br>

        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" value="<?= htmlspecialchars($album['Genre']) ?>" required><br>

        <label for="pochette">Nouvelle pochette</label>
        <input type="file" id="pochette" name="pochette"><br>

        <input type="submit" name="submit" value="Enregistrer les modifications">
    </form>
</div>
</body>
</html>
