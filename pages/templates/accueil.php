<?php

include __DIR__ . '/../../creationBD.php';
include __DIR__ . '/../../Classes/Album.php';
include __DIR__ . '/../../Classes/Artiste.php';

try {
    $file_db = new PDO('sqlite:' . DATABASE_PATH);
    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

$resultat = $file_db->query("SELECT Album.*, Artiste.Nom_Artiste FROM Album INNER JOIN Artiste ON Album.ID_Artiste = Artiste.ID_Artiste");
$albums = $resultat->fetchAll(PDO::FETCH_ASSOC);

$result = $file_db->query("SELECT * FROM Artiste");
$artistes = $result->fetchAll(PDO::FETCH_ASSOC);



if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $stmtPlaylists = $file_db->prepare("SELECT * FROM Playlist WHERE ID_Utilisateur = ?");
    $stmtPlaylists->execute([$userId]);
    $playlists = $stmtPlaylists->fetchAll(PDO::FETCH_ASSOC);
}

$selected = isset($_GET['searchArtist']) && $_GET['searchArtist'] == '1' ? 'artiste' : 'album';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'ajouter_playlist') {
    $titre_playlist = $_POST['titre_playlist'];
    $userId = $_SESSION['user_id'];

    try {
        $stmt = $file_db->prepare("INSERT INTO Playlist (Titre_Playlist, ID_Utilisateur) VALUES (?, ?)");
        $stmt->execute([$titre_playlist, $userId]);

        header('Location: ./accueil.php');
        exit;
    } catch (PDOException $ex) {
        echo "Erreur lors de l'ajout de la playlist : " . $ex->getMessage();
    }
}

$playlists = [];
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $nomUtilisateur = $_SESSION['user_name'];
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
    <link rel="stylesheet" href="../static/CSS/index.css">
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <link rel="stylesheet" href="../static/CSS/header.css">
    <script src="../static/JS/index.js" defer></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
    <title>Spot'Music - Accueil</title>
</head>

<body>
    <div class="header">
        <h1 class="header__title"><a href="./accueil.php"> SPOT'MUSIC</a> </h1>

        <div class="account">
            <a href="../../index.php">Se déconnecter <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
    <div class="main__application">
        <div class="partie__gauche">
            <div class="jenesaispas">
                <div class="compte">
                    <h2>Bienvenue, <?= $nomUtilisateur ?></h2>
                    <p class="premiere__lettre__pseudo"><?= strtoupper($nomUtilisateur[0]) ?></p>
                </div>
                <div class="recherche__artiste__album">
                    <h3 class="rechercher_artiste"><a href="?searchArtist=1"><i class="fa-solid fa-magnifying-glass"></i> Rechercher un artiste</a></h3>
                    <h3 class="rechercher_album"><a href="?searchArtist=0"><i class="fa-solid fa-magnifying-glass"></i> Rechercher un album</a></h3>
                </div>
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
                            <a href="./playlist.php?id=<?= $playlist['ID_Playlist'] ?>">
                                <img src="../static/images/coupDeCoeur.jpeg" alt="Image Playlist">
                                <p><?= htmlspecialchars($playlist['Titre_Playlist']) ?></p>
                            </a>
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

            <main>
                <?php if ($selected === 'artiste') : ?>
                    <?php foreach ($artistes as $artiste) : ?>
                        <?php
                        $artisteObj = new Artiste($artiste['ID_Artiste'], $artiste['Nom_Artiste'], $artiste['Photo']);
                        $artisteObj->render();
                        ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($albums as $album) : ?>
                        <?php
                        $albumobj = new Album(
                            $album['ID_Album'],
                            $album['Titre_Album'],
                            $album['Pochette'],
                            $album['Année_de_sortie'],
                            $album['Nom_Artiste'],
                            $album['Genre']
                        );
                        $albumobj->render();
                        ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </main>
        </div>
    </div>
</body>

</html>