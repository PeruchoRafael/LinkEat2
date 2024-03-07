document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const fournisseurs = document.querySelectorAll('.fournisseur');

    searchInput.addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        
        fournisseurs.forEach(function(fournisseur) {
            const name = fournisseur.getAttribute('data-name');
            if (name.includes(searchValue)) {
                fournisseur.style.display = '';
            } else {
                fournisseur.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('.toggle-favorites').forEach(button => {
        const fournisseurId = button.closest('.fournisseur').getAttribute('data-id');
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        
        if (favorites.includes(fournisseurId)) {
            button.textContent = 'Retirer des favoris';
        } else {
            button.textContent = 'Ajouter aux favoris';
        }

        button.addEventListener('click', function() {
            let index = favorites.indexOf(fournisseurId);
            if (index === -1) {
                favorites.push(fournisseurId);
                button.textContent = 'Retirer des favoris';
            } else {
                favorites.splice(index, 1);
                button.textContent = 'Ajouter aux favoris';
            }
            localStorage.setItem('favorites', JSON.stringify(favorites));
        });
    });
});