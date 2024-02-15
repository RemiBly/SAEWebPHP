<?php
include __DIR__ . '/../../creationBD.php';

// Récupérez l'ID de la playlist à partir de l'URL
$playlistId = isset($_GET['id']) ? $_GET['id'] : 0;

if ($playlistId) {
    // Préparez votre requête pour récupérer les titres de la playlist
    $stmt = $file_db->prepare("SELECT Titre.* FROM Titre
                               INNER JOIN TitrePlaylist ON Titre.ID_Titre = TitrePlaylist.ID_Titre
                               WHERE TitrePlaylist.ID_Playlist = ?");
    $stmt->execute([$playlistId]);
    $titres = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Aucune playlist sélectionnée.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/CSS/detail-album.css">
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/album.css">
    <link rel="stylesheet" href="../static/CSS/titre.css">
    <link rel="stylesheet" href="../static/CSS/artiste.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
    <link rel="stylesheet" href="../static/CSS/carousel.css">
    <script src="../static/JS/detail-album.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1 class="header__title"><a href="./accueil.php"> SPOT'MUSIC</a> </h1>

        <div class="account">
            <a href="../../index.php">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
    <main>
    <h2>Titres de la Playlist</h2>
    <?php if (!empty($titres)): ?>
        <ul>
            <?php foreach ($titres as $titre): ?>
                <li><?= htmlspecialchars($titre['Nom_Titre']) ?> - Durée: <?= $titre['Duree'] ?> minutes</li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Cette playlist est vide.</p>
    <?php endif; ?>
</main>
</body>

</html>