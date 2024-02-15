function filterResults(event) {
    var croix = document.getElementById('croixSelector');
    var barreDeRecherche = document.getElementById('search');
    croix.classList.toggle('fa-xmark', barreDeRecherche.value.length > 0);

    var searchTerm = document.getElementById('search').value.toLowerCase();
    var articles = document.querySelectorAll('.album');

    articles.forEach(function(article) {
        var title = article.dataset.title;
        var artist = article.dataset.artist;
        var date = article.dataset.year;
        var nomArtiste = article.dataset.name;
        if (nomArtiste == null) {
            var isMatch = title.startsWith(searchTerm) || artist.startsWith(searchTerm) || date.startsWith(parseInt(searchTerm));
        } else {
            var isMatch = nomArtiste.startsWith(searchTerm);
        }
        if (isMatch) {
            article.classList.remove('hidden');
        } else {
            article.classList.add('hidden');
        }
    });
}

function resetInputValue() {
    document.getElementById('search').value = '';
    filterResults();
}

function ajouterPlaylist() {
    var nomPlaylist = prompt("Quel nom de playlist souhaitez-vous mettre?");
    if (nomPlaylist) {
        var ul = document.querySelector('.liste__playlist ul');
        var li = document.createElement('li');
        li.innerHTML = '<a href="./pages/templates/playlist.php"> <img src="./pages/static/images/logo-musique.webp" alt=""><p>' + nomPlaylist + '</p> </a>';
        ul.appendChild(li);
    }
}