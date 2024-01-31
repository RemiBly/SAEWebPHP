<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre_album = $_POST['titre_album'];
    $annee_sortie = $_POST['annee_sortie'];
    $genre = $_POST['genre'];
    $id_artiste = $_POST['id_artiste'];
    $pochette = $_POST['pochette'];

    try {
        $file_db = new PDO('sqlite:BD.sqlite3');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO Album (Titre_Album, Année_de_sortie, Genre, ID_Artiste, Pochette) VALUES (?, ?, ?, ?, ?)";
        $stmt = $file_db->prepare($query);
        $stmt->execute([$titre_album, $annee_sortie, $genre, $id_artiste, $pochette]);

        echo "Album ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'album : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Album</title>
</head>
<body>
    <h2>Ajouter un nouvel Album</h2>
    <form action="ajouter_album.php" method="post">
        <label for="titre_album">Titre de l'album:</label><br>
        <input type="text" id="titre_album" name="titre_album"><br>

        <label for="annee_sortie">Année de sortie:</label><br>
        <input type="number" id="annee_sortie" name="annee_sortie"><br>

        <label for="genre">Genre:</label><br>
        <input type="text" id="genre" name="genre"><br>

        <label for="id_artiste">ID de l'artiste:</label><br>
        <input type="number" id="id_artiste" name="id_artiste"><br>

        <label for="pochette">Pochette (URL):</label><br>
        <input type="text" id="pochette" name="pochette"><br>

        <input type="submit" value="Ajouter l'Album">
    </form>
</body>
</html>
