const searchForm = document.getElementById('searchForm');
const searchInput = document.getElementById('searchInput');
const searchResultsDiv = document.getElementById('searchResults');



function fetchSearchResults(searchTerm) {
    fetch(`search_notes.php?searchTerm=${searchTerm}`)
        .then(response => response.json())
        .then(data => displaySearchResults(data))
        .catch(error => console.error('Error fetching notes:', error));
}

// Example usage:
// fetchSearchResults('maths');



searchForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const searchTerm = searchInput.value.trim();

    fetchSearchResults(searchTerm);
});




function displaySearchResults(results) {
    searchResultsDiv.innerHTML = '';

    if (results.length === 0) {
        searchResultsDiv.innerHTML = '<p>No results found.</p>';
        return;
    }

    const table = document.createElement('table');
    table.classList.add('search-table');

    const header = table.createTHead();
    const headerRow = header.insertRow();

    for (let key in results[0]) {
        const th = document.createElement('th');
        th.textContent = key;
        headerRow.appendChild(th);
    }

    const tbody = table.createTBody();

    results.forEach(result => {
        const row = tbody.insertRow();
        for (let key in result) {
            const cell = row.insertCell();
            cell.textContent = result[key];
        }
    });

    searchResultsDiv.appendChild(table);
}

