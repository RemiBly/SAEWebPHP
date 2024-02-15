<?php
include __DIR__ . '/../../creationBD.php';

// Modification de la requête pour inclure le champ Genre
$stmt = $file_db->query("SELECT Album.*, Artiste.Nom_Artiste FROM Album JOIN Artiste ON Album.ID_Artiste = Artiste.ID_Artiste");
$albums = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Albums</title>
    <!-- Inclure votre CSS ici -->
</head>
<body>
<h1>Liste des Albums</h1>
<div class="ajouter-artist">
    <a href="ajouter_album.php" class="btn btn-ajouter" >Ajouter un nouvel album</a>
</div>
<table>
    <thead>
        <tr>
            <th>Titre de l'Album</th>
            <th>Artiste</th>
            <th>Année de Sortie</th>
            <th>Genre</th>
            <th>Pochette</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($albums as $album): ?>
        <tr>
            <td><?= htmlspecialchars($album['Titre_Album']) ?></td>
            <td><?= htmlspecialchars($album['Nom_Artiste']) ?></td>
            <td><?= htmlspecialchars($album['Année_de_sortie']) ?></td>
            <td><?= htmlspecialchars($album['Genre']) ?></td>
            <td>
                <?php if($album['Pochette']): ?>
                    <img src="data:image/jpeg;base64,<?= $album['Pochette'] ?>" alt="Pochette" style="width: 100px;">
                <?php else: ?>
                    Pas de pochette
                <?php endif; ?>
            </td>
            <td>
                <a href="modif-album.php?id=<?= $album['ID_Album'] ?>">Modifier</a>
                <a href="supprimer-album.php?id=<?= $album['ID_Album'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet album ? Cela supprimera aussi les titres que album contient');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
