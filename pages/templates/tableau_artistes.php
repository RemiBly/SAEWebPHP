<?php
include __DIR__ . '/../../creationBD.php';

// Récupération des artistes
$stmt = $file_db->query("SELECT * FROM Artiste");
$artistes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<h1>Liste des Artistes</h1>
<div class="ajouter-artist">
    <a href="ajouter_artiste.php" class="btn btn-ajouter">Ajouter un nouvel artiste</a>
</div>
<table>
    <thead>
        <tr>
            <th>Pos</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Biographie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artistes as $artiste): ?>
        <tr>
            <td><?= $artiste['ID_Artiste'] ?></td>
            <td>
                <?php if($artiste['Photo']): ?>
                    <img src="data:image/jpeg;base64,<?= $artiste['Photo'] ?>" alt="Photo" style="width: 100px;">
                <?php else: ?>
                    Pas de photo
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($artiste['Nom_Artiste']) ?></td>
            <td><?= htmlspecialchars($artiste['Biographie']) ?></td>
            <td class="actions">
                <a href="modif-artiste.php?id=<?= $artiste['ID_Artiste'] ?>"><i class="fa-solid fa-pen"></i></a>
                <a href="supprimer-artiste.php?id=<?= $artiste['ID_Artiste'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet artiste ? Cela supprimera aussi ces albums et ces titres !');"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>