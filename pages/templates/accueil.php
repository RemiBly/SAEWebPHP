<?php include 'creationBD.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'ajouter_playlist') {
    $titre_playlist = $_POST['titre_playlist'];
    $userId = $_SESSION['user_id'];

    try {
        $stmt = $file_db->prepare("INSERT INTO Playlist (Titre_Playlist, ID_Utilisateur) VALUES (?, ?)");
        $stmt->execute([$titre_playlist, $userId]);

        header('Location: accueil.php'); 
        exit;
    } catch (PDOException $ex) {
        echo "Erreur lors de l'ajout de la playlist : " . $ex->getMessage();
    }
}


$playlists = [];
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $stmt = $file_db->prepare("SELECT * FROM Playlist WHERE ID_Utilisateur = ?");
    $stmt->execute([$userId]);
    $playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="variables.css">
    <script src="accueil.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="partie__gauche">
        <div class="jenesaispas">        
        </div>
        <div class="liste__playlist">
            <div class="ajout__playlist">
                <h2><i class="fa-solid fa-list"></i> Votre bibliotèque</h2>
                <form action="accueil.php" method="post">
                    <input type="text" name="titre_playlist" placeholder="Nom de la nouvelle playlist" required>
                    <button type="submit" name="action" value="ajouter_playlist">Créer Playlist</button>
                </form>
            </div>
            <ul>
                <?php foreach ($playlists as $playlist) : ?>
                    <li>
                        <img src="images/coupDeCoeur.jpeg" alt="Image Playlist"> 
                        <p><?= htmlspecialchars($playlist['Titre_Playlist']) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="partie__droite">
        <div class="barre__recherche">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input class="barre__recherche__input" placeholder="Que souhaitez-vous rechercher ?" type="text" id="search" oninput="filterResults(event)" onkeypress="handleKeyPress(event)">
            <i id="croixSelector" class="fa-solid" onclick="resetInputValue()"></i>
        </div>
        <div class="recherche-approfondis">
            <a href="ajouter_artiste.html" class="ajouter-artiste-btn">Ajouter un Artiste</a>
            <a href="ajouter_album.html" class="ajouter-album-btn">Ajouter un Album</a>
        </div>

        <main>
            <?php foreach ($albums as $album) : ?>
                <article class="album" data-title="<?= strtolower($album['Titre_Album']) ?>" data-year="<?= strtolower($album['Année_de_sortie']) ?>" data-artist="<?= strtolower($album['Titre_Album']) ?>">
                    <img src="<?= !empty($album['Pochette']) ? $album['Pochette'] : './images/default.jpg' ?>" alt="Pochette d'album">
                    <div class="contenu">
                        <h3 class="test-arrow"><span><?= $album['Titre_Album'] ?></span></h3>
                        <p><?= $album['Année_de_sortie'] ?> - <?= $album['Nom_Artiste'] ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>
    </div>
</body>

</html>