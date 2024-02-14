<?php


include __DIR__ . '/../../creationBD.php';

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
    <title>Document</title>
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
                <p class="premiere__lettre__pseudo"><?=strtoupper($nomUtilisateur[0]) ?></p>
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
                        <a href="./playlist.php">
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
        <div class="recherche-approfondis">
            <a href="./ajouter_artiste.php" class="ajouter-artiste-btn">Ajouter un Artiste</a>
            <a href="./ajouter_album.php" class="ajouter-album-btn">Ajouter un Album</a>
            <a href="./ajouter_titre.php" class="ajouter-album-btn">Ajouter un Titre</a>
        </div>

        <main>
            <?php if ($selected === 'artiste') : ?>
                <?php foreach ($artistes as $artiste) : ?>
                    <a href="./detail-artiste.php?id=<?= $artiste['ID_Artiste'] ?>" data-name="<?= $artiste['Nom_Artiste'] ?>" class="album artiste">
                        <?php if (empty($artiste['Photo'])) : ?>
                            <img src="../static/images/default.jpg" alt="Image par défaut">
                        <?php else : ?>
                            <!-- Affichage direct de la chaîne base64 stockée dans le HTML -->
                            <img src="data:image/jpeg;base64,<?= $artiste['Photo'] ?>" alt="Photo de <?= htmlspecialchars($artiste['Nom_Artiste']) ?>">
                        <?php endif; ?>
                        <div class="contenu">
                            <h3 class="test-arrow"><span><?= $artiste['Nom_Artiste'] ?></span></h3>
                            <p>Artiste</p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <?php foreach ($albums as $album) : ?>
                    <a href="./detail-album.php?id=<?= $album['ID_Album'] ?>" class="album__css album" data-title="<?= strtolower($album['Titre_Album']) ?>" data-year="<?= strtolower($album['Année_de_sortie']) ?>" data-artist="<?= strtolower($album['Nom_Artiste']) ?>" data-genre="<?= strtolower($album['Genre']) ?>">
                        <?php if (!empty($album['Pochette'])) : ?>
                            <!-- Affichage direct de la chaîne base64 stockée dans le HTML pour les albums également -->
                            <img src="data:image/jpeg;base64,<?= $album['Pochette'] ?>" alt="Pochette d'album de <?= htmlspecialchars($album['Titre_Album']) ?>">
                        <?php else : ?>
                            <img src="../static/images/default.jpg" alt="Pochette par défaut">
                        <?php endif; ?>
                        <div class="contenu">
                            <h3 class="test-arrow"><span><?= $album['Titre_Album'] ?></span></h3>
                            <p><?= $album['Année_de_sortie'] ?> - <?= $album['Nom_Artiste'] ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    </div>
    </div>
</body>

</html>