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
