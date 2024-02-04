document.addEventListener("DOMContentLoaded", function() {
    const barreRecherche = document.getElementById("barre-recherche");
    const resultatsRecherche = document.getElementById("resultats-recherche");
    const idArtisteInput = document.getElementById("barre-recherche");

    barreRecherche.addEventListener("input", function() {
        const recherche = barreRecherche.value.toLowerCase();
        const resultats = [];

        for (const artiste of dataArtiste) {
            if (artiste.Nom_Artiste.toLowerCase().startsWith(recherche)) {
                resultats.push(artiste);
            }
        }

        const resultatHTML = resultats.map(artiste => {
            return `<div class="resultat-item" data-id="${artiste.ID_Artiste}">
                        ${artiste.ID_Artiste} - ${artiste.Nom_Artiste}
                    </div>`;
        }).join("");

        resultatsRecherche.innerHTML = resultatHTML;
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
