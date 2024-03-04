//make a searchInput
const searchInput = document.getElementById('searchInput');
  const searchResults = document.getElementById('searchResults');

  searchInput.addEventListener('input', function() {
    const searchText = this.value.trim().toLowerCase();

    // Clear previous search results
    searchResults.innerHTML = '';

    if (searchText.length === 0) {
      return;
    }

    // Simulated data for demonstration
    const data = [
      "Apple", "Banana", "Orange", "Pear", "Pineapple", "Grapes",
      "Mango", "Strawberry", "Blueberry", "Raspberry", "Watermelon"
    ];

    const filteredResults = data.filter(item => {
      return item.toLowerCase().includes(searchText);
    });

    if (filteredResults.length === 0) {
      searchResults.innerHTML = '<p>No results found</p>';
    } else {
      const ul = document.createElement('ul');
      filteredResults.forEach(item => {
        const p = document.createElement('p');
        p.textContent = item;
        ul.appendChild(p);
      });
      searchResults.appendChild(ul);
    }
  });