<?php
include __DIR__ . '/../../creationBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre_album = $_POST['titre_album'];
    $annee_sortie = $_POST['annee_sortie'];
    $genre = $_POST['genre'];
    $id_artiste = intval($_POST['barre-recherche']);
    
    // Traitement de la pochette téléchargée
    if (isset($_FILES['pochette']) && $_FILES['pochette']['error'] == 0) {
        $tmpName = $_FILES['pochette']['tmp_name'];
        $pochetteContent = file_get_contents($tmpName);
        $pochette = base64_encode($pochetteContent);
    } else {
        $pochette = ""; // Gérer l'absence de pochette ou erreur selon votre besoin
    }

    try {
        $query = "INSERT INTO Album (Titre_Album, Année_de_sortie, Genre, ID_Artiste, Pochette) VALUES (?, ?, ?, ?, ?)";
        $stmt = $file_db->prepare($query);
        $stmt->execute([$titre_album, $annee_sortie, $genre, $id_artiste, $pochette]);

        echo "<p>Album ajouté avec succès.</p>";
    } catch (PDOException $e) {
        echo "<p>Erreur lors de l'ajout de l'album : " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Album</title>
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/formulaire.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
    <script src="../static/JS/administration.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h1 class="header__title"><a href="./accueil.php"> SPOT'MUSIC</a> </h1>
        <div class="account">
            <a href="../../index.php">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
    <main>
        <div class="contenu">
            <h2>Ajouter un nouvel Album</h2>
            <form action="ajouter_album.php" method="post" enctype="multipart/form-data">
                <label for="titre_album">Titre de l'album</label>
                <input type="text" id="titre_album" name="titre_album" required><br>

                <label for="annee_sortie">Année de sortie</label>
                <input type="number" id="annee_sortie" name="annee_sortie" required><br>

                <label for="genre">Genre</label>
                <input type="text" id="genre" name="genre" required><br>

                <div class="recherche-artiste">
                    <label for="id_artiste">Artiste</label>
                    <input type="text" id="barre-recherche" name="barre-recherche" required>
                    <div id="resultats-recherche"></div>
                </div>

                <label for="pochette">Pochette</label>
                <input type="file" id="pochette" name="pochette" required><br>

                <div class="center__btn">
                    <input type="submit" value="Ajouter l'Album">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
