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

function changementPoubelle(id, idTitre) {
    var poubelle = document.getElementById(id);
    if (poubelle !== null) {
        if (poubelle.classList.contains("fa-solid")) {
            poubelle.classList.remove("fa-solid");
            poubelle.classList.add("fa-regular");
            // Utilisation de l'ID de la playlist "Coup de cœur"
            console.log(idPlaylist);
            fetch('ajoutTitrePlaylist.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'action=ajouter&titreID=' + idTitre + '&playlistID=' + idPlaylist
            })
            .then(response => response.text())
            .then(response => console.log(response))
            .catch(error => console.error('Error:', error));
        } else if (poubelle.classList.contains("fa-regular")) {
            poubelle.classList.remove("fa-regular");
            poubelle.classList.add("fa-solid");
            // retirer le titre de la playlist
            fetch('ajoutTitrePlaylist.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'action=retirer&titreID=' + idTitre + '&playlistID=' + idPlaylist
            })
            .then(response => response.text())
            .then(response => console.log(response))
            .catch(error => console.error('Error:', error));
        }
    } else {
        console.error("L'élément avec l'ID " + id + " n'a pas été trouvé.");
    }
}

function ajouterAPlaylist(idTitre) {
    console.log("Ajouter à la playlist");
    let playlistsString = "";
    for (let i = 0; i < playlists.length; i++) {
        playlistsString += playlists[i]["ID_Playlist"] + ", " + playlists[i]["Titre_Playlist"] + "\n";
    }
    let idPlaylist = prompt("Ajouter à la playlist (entrer l'id):\n" + playlistsString);
    // Utilisation de l'ID de la playlist choisie
    console.log(idPlaylist);
    fetch('ajoutTitrePlaylist.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'action=ajouter&titreID=' + idTitre + '&playlistID=' + idPlaylist
    })
    .then(response => response.text())
    .then(response => console.log(response))
    .catch(error => console.error('Error:', error));
}
