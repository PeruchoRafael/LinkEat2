document.addEventListener('DOMContentLoaded', function() {
    let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
    const container = document.getElementById('favoriteSuppliers');
    
    function updateFavoritesDisplay() {
        container.innerHTML = ''; // Efface les éléments existants
        if (favorites.length > 0) {
            favorites.forEach(fav => {
                // Crée un div pour contenir les informations du fournisseur
                const div = document.createElement('div');
                div.className = "mb-4"; // Ajoute une marge en bas

                // Crée un paragraphe pour le nom du fournisseur
                const p = document.createElement('p');
                p.textContent = `Fournisseur: ${fav.name}`;
                div.appendChild(p); // Ajoute le paragraphe au div

                // Crée un bouton pour voir le profil du fournisseur
                const viewProfileButton = document.createElement('a');
                viewProfileButton.setAttribute('href', `/restaurateur/fournisseur/${fav.id}`); // Utilisez l'URL correcte pour votre application
                viewProfileButton.className = "inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700";
                viewProfileButton.textContent = "Voir le profil";
                div.appendChild(viewProfileButton); // Ajoute le bouton au div

                container.appendChild(div); // Ajoute le div au container
            });
        } else {
            container.textContent = 'Vous n\'avez pas encore ajouté de fournisseurs aux favoris.';
        }
    }

    updateFavoritesDisplay();
});
