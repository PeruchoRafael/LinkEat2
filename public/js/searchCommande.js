document.addEventListener("DOMContentLoaded", function() {
    // Récupère l'input de recherche et les lignes de la table
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('keyup', function(e) {
        const searchValue = e.target.value.toLowerCase();

        tableRows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            // Affiche les lignes qui correspondent et cache les autres
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });
});