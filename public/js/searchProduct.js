document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchProduct');
    const tableRows = document.querySelectorAll('#productsTable tbody tr');

    searchInput.addEventListener('keyup', function(e) {
        const searchQuery = e.target.value.toLowerCase();

        tableRows.forEach(row => {
            const productName = row.cells[0].textContent.toLowerCase();
            const productDescription = row.cells[1].textContent.toLowerCase();
            if (productName.includes(searchQuery) || productDescription.includes(searchQuery)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});