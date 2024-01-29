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
