function changementCoeur(id) {
    var coeur = document.getElementById(id);

    if (coeur !== null) {
        // Vérifier si l'icône du cœur est pleine ou vide
        if (coeur.classList.contains("fa-regular")) {
            // Si le cœur est vide, le remplir
            coeur.classList.remove("fa-regular");
            coeur.classList.add("fa-solid");
        } else {
            // Si le cœur est plein, le vider
            coeur.classList.remove("fa-solid");
            coeur.classList.add("fa-regular");
        }
    } else {
        console.error("L'élément avec l'ID " + id + " n'a pas été trouvé.");
    }
}

function afficherPlaylists(playlists) {
    console.log(playlists);
    let elem = document.getElementById("playlists");
    elem.innerHTML = "";
    playlists.forEach(function (playlist) {
        let div = document.createElement("div");
        div.classList.add("col-12", "col-md-6", "col-lg-4", "col-xl-3");
        div.innerHTML = `
            <div class="card">
                <img src="${playlist.cover}" class="card-img-top" alt="${playlist.name}">
                <div class="card-body">
                    <h5 class="card-title">${playlist.name}</h5>
                    <p class="card-text">${playlist.description}</p>
                    <a href="/playlist/${playlist.id}" class="btn btn-primary">Voir la playlist</a>
                </div>
            </div>
        `;
        elem.appendChild(div);
    });
}