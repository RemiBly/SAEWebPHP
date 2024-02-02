<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_artiste = $_POST['nom_artiste'];
    $biographie = $_POST['biographie'];
    $photo = $_POST['photo'];

    try {
        $file_db = new PDO('sqlite:BD.sqlite3');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO Artiste (Nom_Artiste, Biographie, Photo) VALUES (?, ?, ?)";
        $stmt = $file_db->prepare($query);
        $stmt->execute([$nom_artiste, $biographie, $photo]);

        echo "Artiste ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'artiste : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Artiste</title>
</head>
<body>
    <h2>Ajouter un nouvel Artiste</h2>
    <form action="ajouter_artiste.php" method="post">
        <label for="nom_artiste">Nom de l'artiste:</label><br>
        <input type="text" id="nom_artiste" name="nom_artiste"><br>

        <label for="biographie">Biographie:</label><br>
        <textarea id="biographie" name="biographie"></textarea><br>

        <label for="photo">Photo (URL):</label><br>
        <input type="text" id="photo" name="photo"><br>

        <input type="submit" value="Ajouter l'Artiste">
    </form>
</body>
</html>
