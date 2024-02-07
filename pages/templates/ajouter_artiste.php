<?php
include __DIR__ . '/../../configBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include __DIR__ . '/../../configBD.php';
    $id_album = $_POST['id_album'];
    $nom_titre = $_POST['nom_titre'];
    $duree = $_POST['duree'];
    $lien = $_POST['lien'];

    try {
        $query = "INSERT INTO Titre (Nom_Titre, Duree, Lien, ID_Album) VALUES (?, ?, ?, ?)";
        $stmt = $file_db->prepare($query);
        $stmt->execute([$nom_titre, $duree, $lien, $id_album]);

        echo "Titre ajouté avec succès à l'album.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout du titre : " . $e->getMessage();
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
            <h2>Ajouter un nouvel Artiste</h2>
            <form action="ajouter_artiste.php" method="post">
                <label for="nom_artiste">Nom de l'artiste</label><br>
                <input type="text" id="nom_artiste" name="nom_artiste" placeholder="Ex : Yeat"><br>

                <label for="biographie">Biographie</label><br>
                <textarea id="biographie" name="biographie" placeholder="Ex : Reconnu dans le monde entier par ..."></textarea><br>

                <label for="photo">Photo</label><br>
                <input type="text" id="photo" name="photo" placeholder="Lien image (URL)"><br>

                <div class="center__btn">
                    <input type="submit" value="Ajouter l'Artiste">
                </div>
            </form>
        </div>
    </main>
</body>
</html>