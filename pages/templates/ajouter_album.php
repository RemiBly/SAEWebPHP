<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre_album = $_POST['titre_album'];
    $annee_sortie = $_POST['annee_sortie'];
    $genre = $_POST['genre'];
    $id_artiste = intval($_POST['barre-recherche']);
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

<?php
try {
    $bdd = new PDO('sqlite:BD.sqlite3');
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

<!-- Intégrer les données encodées en JSON dans le script JavaScript -->
<script>
    const dataArtiste = <?php echo $dataArtisteJSON; ?>;
</script>

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
            <form action="ajouter_album.php" method="post">
                <label for="titre_album">Titre de l'album</label><br>
                <input type="text" id="titre_album" name="titre_album" placeholder="Ex : Lyfe"><br>

                <label for="annee_sortie">Année de sortie</label><br>
                <input type="number" id="annee_sortie" name="annee_sortie" placeholder="Ex : 2024"><br>

                <label for="genre">Genre</label><br>
                <input type="text" id="genre" name="genre" placeholder="Ex : Rap"><br>

                <div class="recherche-artiste">
                    <label for="idartiste">ID Artiste</label>
                    <input type="text" name='barre-recherche' id="barre-recherche" placeholder="Rechercher un artiste">
                    <div id="resultats-recherche"></div>
                </div>

                <label for="pochette">Pochette (URL)</label><br>
                <input type="text" id="pochette" name="pochette" placeholder="Lien image (URL)"><br>

                <div class="center__btn">
                    <input type="submit" value="Ajouter l'Album">
                </div>
            </form>
        </div>
    </main>
</body>

</html>