const includedFilters = document.getElementById("includedFilters");
const excludedFilters = document.getElementById("excludedFilters");

// Listen for checkbox changes
document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        handleFilterChange(checkbox);
    });
});

function handleFilterChange(checkbox) {
    const filterType = document.querySelector('input[name="filterType"]:checked').id;
    const filterContainer = (filterType === 'includeFilter') ? includedFilters : excludedFilters;

    if (checkbox.checked) {
        addFilterItem(filterContainer, checkbox);
    } else {
        removeFilterItem(filterContainer, checkbox.value);
    }
}

// Add filter item to the list
function addFilterItem(container, checkbox) {
    const filterDiv = document.createElement('div');
    filterDiv.className = "badge  m-1 d-flex justify-content-between align-items-center";
    filterDiv.setAttribute('data-filter', checkbox.value); // Set the data-filter attribute

    // Create text node for filter
    const textNode = document.createTextNode(checkbox.value);
    filterDiv.appendChild(textNode);

    // Create close button
    const closeButton = document.createElement('button');
    closeButton.className = "btn-close ms-2";
    closeButton.onclick = function () {
        removeFilterItem(container, checkbox.value);
        checkbox.checked = false; // Uncheck the checkbox
    };

    filterDiv.appendChild(closeButton);
    container.appendChild(filterDiv);
}

// Remove filter item from the list
function removeFilterItem(container, filter) {
    const filterDiv = container.querySelector(`div[data-filter="${filter}"]`);
    if (filterDiv) {
        container.removeChild(filterDiv);
    }
}