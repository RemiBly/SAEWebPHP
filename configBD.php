<?php
include __DIR__ . '/creationBD.php';
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

?>
