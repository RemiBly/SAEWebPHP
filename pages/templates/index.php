<?php

// Données dans l'extrait mais sous la forme d'une liste en PHP
$data = [
    [
        'by' => 'Superdrag',
        'entryId' => 67913,
        'genre' => ['Rock', 'Punk'],
        'img' => 'images/Superdrag-Stereo_360_Sound.jpg',
        'parent' => 'Superdrag',
        'releaseYear' => 1998,
        'title' => 'Stereo 360 Sound',
    ],
    [
        'by' => '16 Horsepower',
        'entryId' => 10575,
        'genre' => ['Alternative country', 'neofolk'],
        'img' => 'images/220px-Folklore_hp.jpg',
        'parent' => '16 Horsepower',
        'releaseYear' => 2002,
        'title' => 'Folklore',
    ],
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php foreach ($data as $album) : ?>
            <article>
                <h2><?= $album['title'] ?></h2>
                <p><?= $album['by'] ?></p>
                <p><?= $album['releaseYear'] ?></p>
                <p><?= $album['genre'][0] ?></p>
                <p><?= $album['genre'][1] ?></p>
                <img src="<?= $album['img'] ?>" alt="">
            </article>
        <?php endforeach; ?>
    </main>
</body>
</html>
