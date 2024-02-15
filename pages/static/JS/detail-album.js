function changementCoeur(id, idTitre) {
    var coeur = document.getElementById(id);
    if (coeur !== null) {
        if (coeur.classList.contains("fa-regular")) {
            coeur.classList.remove("fa-regular");
            coeur.classList.add("fa-solid");
            // Utilisation de l'ID de la playlist "Coup de cœur"
            console.log(idCoupDeCoeur);
            fetch('ajoutTitrePlaylist.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'action=ajouter&titreID=' + idTitre + '&playlistID=' + idCoupDeCoeur
            })
            .then(response => response.text())
            .then(response => console.log(response))
            .catch(error => console.error('Error:', error));
        } else if (coeur.classList.contains("fa-solid")) {
            coeur.classList.remove("fa-solid");
            coeur.classList.add("fa-regular");
            // Ajoutez ici le code pour retirer le titre de la playlist si nécessaire
            // retirer le titre de la playlist
            fetch('ajoutTitrePlaylist.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'action=retirer&titreID=' + idTitre + '&playlistID=' + idCoupDeCoeur
            })
            .then(response => response.text())
            .then(response => console.log(response))
            .catch(error => console.error('Error:', error));
        }
    } else {
        console.error("L'élément avec l'ID " + id + " n'a pas été trouvé.");
    }
}
