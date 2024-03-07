document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const fournisseursList = document.getElementById('fournisseursList').getElementsByClassName('fournisseur');

    function filterFournisseurs() {
        const searchText = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();

        Array.from(fournisseursList).forEach(fournisseur => {
            const name = fournisseur.getAttribute('data-name').toLowerCase();
            const category = fournisseur.getAttribute('data-category').toLowerCase();

            const matchesSearch = searchText === '' || name.includes(searchText);
            const matchesCategory = selectedCategory === '' || category === selectedCategory;

            if (matchesSearch && matchesCategory) {
                fournisseur.style.display = '';
            } else {
                fournisseur.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('keyup', filterFournisseurs);
    categoryFilter.addEventListener('change', filterFournisseurs);
});
