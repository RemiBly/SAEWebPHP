<?php

include __DIR__ . '/../../creationBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_artiste = $_POST['nom_artiste'];
    $biographie = $_POST['biographie'];
    
    // Traitement de la photo téléchargée
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        // Chemin temporaire du fichier téléchargé
        $tmpName = $_FILES['photo']['tmp_name'];
        // Lire le contenu du fichier
        $photoContent = file_get_contents($tmpName);
        // Convertir le contenu du fichier en base64
        $photoBase64 = base64_encode($photoContent);
    } else {
        $photoBase64 = ""; // Ou gérer l'erreur selon votre besoin
    }

    try {
        $file_db = new PDO('sqlite:' . DATABASE_PATH);
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO Artiste (Nom_Artiste, Biographie, Photo) VALUES (?, ?, ?)";
        $stmt = $file_db->prepare($query);
        $stmt->execute([$nom_artiste, $biographie, $photoBase64]);

        echo "<p class='message__ajout'>Artiste ajouté avec succès.</p>";
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
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/formulaire.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
    <script src="../static/JS/formArtiste.js" defer></script>
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
            <h2>Ajouter un nouvel Artiste</h2>
            <form action="ajouter_artiste.php" method="post" enctype="multipart/form-data">
                <label for="nom_artiste">Nom de l'artiste</label><br>
                <input type="text" id="nom_artiste" name="nom_artiste" placeholder="Ex : Yeat"><br>

                <label for="biographie">Biographie</label><br>
                <textarea id="biographie" name="biographie" placeholder="Ex : Reconnu dans le monde entier par ..."></textarea><br>

                <div id="file-info" style="display: none;">
                    <img id="preview-image" src="#" alt="Pochette de l'album">
                </div>
                <input type="file" id="photo" name="photo" required><br>
                <label id="pochette_css" for="photo"><span><i class="fa-solid fa-download"></i> Choisir une photo</label></span><br>

                <div class="center__btn">
                    <input type="submit" value="Ajouter l'Artiste">
                </div>
            </form>
        </div>
    </main>
</body>
</html>