<?php
include __DIR__ . '/../../creationBD.php';

// Vérifiez si l'ID de l'artiste a été passé à la page
if (isset($_GET['id'])) {
    $id_artiste = $_GET['id'];

    // Récupérez les informations de l'artiste à partir de la base de données
    $query = "SELECT * FROM Artiste WHERE ID_Artiste = ?";
    $stmt = $file_db->prepare($query);
    $stmt->execute([$id_artiste]);
    $artiste = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$artiste) {
        echo "Artiste non trouvé";
        exit;
    }
} else {
    echo "Aucun ID d'artiste spécifié.";
    exit;
}

if (isset($_POST['submit'])) {
    // Récupérez les données du formulaire
    $nom_artiste = $_POST['nom_artiste'];
    $biographie = $_POST['biographie'];

    // Traitement de la nouvelle photo téléchargée
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $tmpName = $_FILES['photo']['tmp_name'];
        $photoContent = file_get_contents($tmpName);
        $photo = base64_encode($photoContent);
    } else {
        // Si pas de nouvelle photo, conserver l'ancienne
        $photo = $artiste['Photo'];
    }

    // Mettez à jour l'artiste dans la base de données
    $query = "UPDATE Artiste SET Nom_Artiste = ?, Biographie = ?, Photo = ? WHERE ID_Artiste = ?";
    $stmt = $file_db->prepare($query);
    $result = $stmt->execute([$nom_artiste, $biographie, $photo, $id_artiste]);

    if ($result) {
        header("Location: CRUDartiste.php");
        exit;
    } else {
        echo "<p>Erreur lors de la mise à jour de l'artiste.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Artiste</title>
    <!-- Styles -->
</head>
<body>
<div class="contenu">
    <h2>Modifier l'Artiste</h2>
    <form action="modif-artiste.php?id=<?= htmlspecialchars($id_artiste) ?>" method="post" enctype="multipart/form-data">
        <label for="nom_artiste">Nom de l'artiste</label>
        <input type="text" id="nom_artiste" name="nom_artiste" value="<?= htmlspecialchars($artiste['Nom_Artiste']) ?>" required><br>

        <label for="biographie">Biographie</label>
        <textarea id="biographie" name="biographie" required><?= htmlspecialchars($artiste['Biographie']) ?></textarea><br>

        <label for="photo">Nouvelle photo</label>
        <input type="file" id="photo" name="photo"><br>

        <input type="submit" name="submit" value="Enregistrer les modifications">
    </form>
</div>
</body>
</html>
