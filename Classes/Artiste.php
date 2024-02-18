<?php
class Artiste {
    private $nomArtiste;
    private $photo;
    private $idArtiste;


    public function __construct($idArtiste, $nomArtiste, $photo) {
        $this->idArtiste = $idArtiste;
        $this->nomArtiste = $nomArtiste;
        $this->photo = $photo;
    }


    public function render() {
        echo '<a href="./detail-artiste.php?id=', $this->idArtiste, '" data-name="', strtolower($this->nomArtiste), '" class="album artiste">';
        if (empty($this->photo)) {
            echo '<img src="../static/images/default.jpg" alt="Image par défaut">';
        } else {
            echo '<img src="data:image/jpeg;base64,', $this->photo, '" alt="Photo de ', $this->nomArtiste, '">';
        }
        echo '<div class="contenu">';
        echo '<h3 class="test-arrow"><span>', $this->nomArtiste, '</span></h3>';
        echo '<p>Artiste</p>';
        echo '</div>';
        echo '</a>';
    }
}
?>
