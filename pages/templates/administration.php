<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Dynamique</title>
    <link rel="stylesheet" href="../static/CSS/administration.css">
    <link rel="stylesheet" href="../static/CSS/variables.css">
    <script src="../static/JS/administration.js"></script>
    <script src="https://kit.fontawesome.com/b2318dca58.js" crossorigin="anonymous"></script>
</head>
<body>
    <div>
    <div class="container">
        <div class="tabs">
            <button class="tablinks" onclick="openTab(event, 'albums')">Liste des Albums</button>
            <button class="tablinks" onclick="openTab(event, 'artistes')">Liste des Artistes</button>
        </div>
        <div id="albums" class="tabcontent">
            <?php include 'tableau_albums.php'; ?>
        </div>
        <div id="artistes" class="tabcontent">
            <?php include 'tableau_artistes.php'; ?>
        </div>
    </div>
    </div>
</body>
</html>
