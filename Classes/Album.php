<?php
class Album {
    private $id;
    private $titre;
    private $pochette;
    private $anneeSortie;
    private $nomArtiste;
    private $genre;


    public function __construct($id, $titre, $pochette, $anneeSortie, $nomArtiste, $genre) {
        $this->id = $id;
        $this->titre = $titre;
        $this->pochette = $pochette;
        $this->anneeSortie = $anneeSortie;
        $this->nomArtiste = $nomArtiste;
        $this->genre = $genre;
    }


    public function render() {
        echo '<a href="./detail-album.php?id=', $this->id, '" class="album__css album" data-title="', strtolower($this->titre), '" data-year="', strtolower($this->anneeSortie), '" data-artist="', strtolower($this->nomArtiste), '" data-genre="', strtolower($this->genre), '">';
        if (!empty($this->pochette)) {
            echo '<img src="data:image/jpeg;base64,', $this->pochette, '" alt="Pochette d\'album de ', htmlspecialchars($this->titre), '">';
        } else {
            echo '<img src="../static/images/default.jpg" alt="Pochette par défaut">';
        }
        echo '<div class="contenu">';
        echo '<h3 class="test-arrow"><span>', $this->titre, '</span></h3>';
        echo '<p>', $this->anneeSortie, ' - ', $this->nomArtiste, '</p>';
        echo '</div>';
        echo '</a>';
    }
}
?>
