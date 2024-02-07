<?php
include __DIR__ . '/../../configBD.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'ajouter_titre') {
    

    $nom_titre = $_POST['nom_titre'];
    $photo = $_POST['photo'];
    $duree = $_POST['duree'];
    $lien = $_POST['lien'];
    $id_album = $_POST['id_album'];
    $id_artiste = $_POST['id_artiste'];

    try {
        $query = "INSERT INTO Titre (Nom_Titre, Photo, Duree, Lien, ID_Album, ID_Artiste) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $file_db->prepare($query);
        $stmt->execute([$nom_titre, $photo, $duree, $lien, $id_album, $id_artiste]);

        echo "<p>Titre ajouté avec succès.</p>";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout du titre : " . $e->getMessage();
    }
}

?>

<?php
try {
    $bdd = new PDO('sqlite:' . DATABASE_PATH);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$sql = "SELECT ID_Artiste, Nom_Artiste FROM Artiste";
$resultat = $bdd->query($sql);

if ($resultat) {
    $dataArtiste = $resultat->fetchAll(PDO::FETCH_ASSOC);
    $dataArtisteJSON = json_encode($dataArtiste);
    $bdd = null;
} else {
    die("Erreur lors de l'exécution de la requête : " . print_r($bdd->errorInfo(), true));
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Titre</title>
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/formulaire.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
</head>
<body>
    <div class="header">
        <h1 class="header__title"><a href="./accueil.php">SPOT'MUSIC</a></h1>
        <div class="account">
            <a href="../../index.php">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
    <main>
        <div class="contenu">
            <h2>Ajouter un Nouveau Titre</h2>
            <form action="ajouter_titre.php" method="post">
                <input type="hidden" name="action" value="ajouter_titre">
                <label for="nom_titre">Nom du titre:</label>
                <input type="text" id="nom_titre" name="nom_titre" required><br>

                <label for="photo">Photo (URL):</label>
                <input type="text" id="photo" name="photo"><br>

                <label for="duree">Durée (secondes):</label>
                <input type="number" id="duree" name="duree" required><br>

                <label for="lien">Lien (URL):</label>
                <input type="text" id="lien" name="lien"><br>

                <label for="id_album">ID de l'Album:</label>
                <input type="number" id="id_album" name="id_album" required><br>

                <label for="id_artiste">ID de l'Artiste:</label>
                <input type="number" id="id_artiste" name="id_artiste" required><br>

                <div class="center__btn">
                    <input type="submit" value="Ajouter le Titre">
                </div>
            </form>
        </div>
    </main>
</body>
</html>

