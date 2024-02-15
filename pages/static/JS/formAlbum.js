document.addEventListener("DOMContentLoaded", function() {
    const inputPochette = document.getElementById("pochette");
    const fileInfoDiv = document.getElementById("file-info");
    const previewImage = document.getElementById("preview-image");

    inputPochette.addEventListener("change", function() {
        if (inputPochette.files.length > 0) {
            const file = inputPochette.files[0];
            const reader = new FileReader();


            // Affiche l'image sélectionnée
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                fileInfoDiv.style.display = "flex"; // Affiche les informations du fichier
            }

            reader.readAsDataURL(file);
        } else {
            // Réinitialise le texte du nom du fichier et masque l'image
            fileNameSpan.textContent = "";
            previewImage.src = "";
            fileInfoDiv.style.display = "none"; // Masque les informations du fichier
        }
    });
});