document.addEventListener('DOMContentLoaded', function() {
    const toggleFavoritesButtons = document.querySelectorAll('.toggle-favorite');

    function updateFavoriteStatus(fournisseurId, isFavorite) {
        const starElement = document.querySelector(`button[data-id="${fournisseurId}"] svg`);
        if (starElement) {
            if (isFavorite) {
                starElement.classList.add('text-yellow-500', 'hover:text-yellow-600');
                starElement.classList.remove('text-gray-400', 'hover:text-gray-500');
            } else {
                starElement.classList.add('text-gray-400', 'hover:text-gray-500');
                starElement.classList.remove('text-yellow-500', 'hover:text-yellow-600');
            }
        }
    }

    function toggleFavorite(e) {
        const fournisseurId = e.currentTarget.getAttribute('data-id');
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        const fournisseur = {
            id: fournisseurId,
            name: e.currentTarget.getAttribute('data-name') // Assumant que vous avez ajouté cet attribut
        };
        const index = favorites.findIndex(fav => fav.id === fournisseurId);

        if (index > -1) {
            favorites.splice(index, 1);
        } else {
            favorites.push(fournisseur);
        }

        localStorage.setItem('favorites', JSON.stringify(favorites));
        updateFavoriteStatus(fournisseurId, index === -1);
    }

    toggleFavoritesButtons.forEach(button => {
        button.addEventListener('click', toggleFavorite);
        const fournisseurId = button.getAttribute('data-id');
        const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        const isFavorite = favorites.some(fav => fav.id === fournisseurId);
        updateFavoriteStatus(fournisseurId, isFavorite);
    });
});
