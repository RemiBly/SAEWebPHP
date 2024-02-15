document.addEventListener("DOMContentLoaded", function() {
    const barreRecherche = document.getElementById("barre-recherche");
    const resultatsRecherche = document.getElementById("resultats-recherche");
    const idArtisteInput = document.getElementById("barre-recherche");

    barreRecherche.addEventListener("input", function() {
        const recherche = barreRecherche.value.toLowerCase();

        // Effectuer une requête AJAX pour obtenir les données des artistes
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'ajouter_album.php?get_artists=1', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const dataArtiste = JSON.parse(xhr.responseText);
                
                // Filtrer les artistes en fonction de la recherche
                const resultats = dataArtiste.filter(artiste =>
                    artiste.Nom_Artiste.toLowerCase().startsWith(recherche)
                );

                // Générer le HTML des résultats
                const resultatHTML = resultats.map(artiste => {
                    return `<div class="resultat-item" data-id="${artiste.ID_Artiste}">
                                ${artiste.ID_Artiste} - ${artiste.Nom_Artiste}
                            </div>`;
                }).join("");

                // Afficher les résultats dans la section dédiée
                resultatsRecherche.innerHTML = resultatHTML;
            }
        };
        xhr.send();
    });

    resultatsRecherche.addEventListener("click", function(e) {
        const resultatClic = e.target;
        if (resultatClic.classList.contains("resultat-item")) {
            const idArtiste = resultatClic.getAttribute("data-id");
            idArtisteInput.value = idArtiste;

            // Cacher la section des résultats 
            resultatsRecherche.innerHTML = "";
        }
    });
});


function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}

// Cacher les onglets non actifs au chargement de la page
document.addEventListener("DOMContentLoaded", function(event) {
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Afficher le premier onglet par défaut
    document.getElementById('albums').style.display = "block";
});


