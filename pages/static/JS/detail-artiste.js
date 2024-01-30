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
