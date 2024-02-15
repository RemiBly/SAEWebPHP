<?php
include __DIR__ . '/../../creationBD.php';

// Récupération des artistes
$stmt = $file_db->query("SELECT * FROM Artiste");
$artistes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Artistes</title>
    <!-- Inclure votre CSS ici -->
</head>
<body>
<h1>Liste des Artistes</h1>
<div class="ajouter-artist">
    <a href="ajouter_artiste.php" class="btn btn-ajouter">Ajouter un nouvel artiste</a>
</div>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Biographie</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artistes as $artiste): ?>
        <tr>
            <td><?= htmlspecialchars($artiste['Nom_Artiste']) ?></td>
            <td><?= htmlspecialchars($artiste['Biographie']) ?></td>
            <td>
                <?php if($artiste['Photo']): ?>
                    <img src="data:image/jpeg;base64,<?= $artiste['Photo'] ?>" alt="Photo" style="width: 100px;">
                <?php else: ?>
                    Pas de photo
                <?php endif; ?>
            </td>
            <td>
                <a href="modif-artiste.php?id=<?= $artiste['ID_Artiste'] ?>">Modifier</a>
                <a href="supprimer-artiste.php?id=<?= $artiste['ID_Artiste'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet artiste ? Cela supprimera aussi ces albums et ces titres !');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
