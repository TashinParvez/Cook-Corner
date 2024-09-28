let currentFilter = "All";

function changeFilter(filterBy) {
    const filterButton = document.getElementById("filterDropdown");

    filterButton.textContent = "Filter by: " + filterBy;

    document.getElementById("check-all").textContent = "";
    document.getElementById("check-techniques").textContent = "";
    document.getElementById("check-storage").textContent = "";
    document.getElementById("check-hacks").textContent = "";
    document.getElementById("check-meal-prep").textContent = "";
    document.getElementById("check-safety").textContent = "";
    document.getElementById("check-baking").textContent = "";
    document.getElementById("check-healthy").textContent = "";
    document.getElementById("check-herbs").textContent = "";
    document.getElementById("check-cleaning").textContent = "";
    document.getElementById("check-leftovers").textContent = "";

    if (filterBy === "All") {
        document.getElementById("check-all").textContent = "✔";
    } else if (filterBy === "Cooking Techniques") {
        document.getElementById("check-techniques").textContent = "✔";
    } else if (filterBy === "Ingredient Storage") {
        document.getElementById("check-storage").textContent = "✔";
    } else if (filterBy === "Time-Saving Hacks") {
        document.getElementById("check-hacks").textContent = "✔";
    } else if (filterBy === "Meal Prep Tips") {
        document.getElementById("check-meal-prep").textContent = "✔";
    } else if (filterBy === "Food Safety") {
        document.getElementById("check-safety").textContent = "✔";
    } else if (filterBy === "Baking Tips") {
        document.getElementById("check-baking").textContent = "✔";
    } else if (filterBy === "Healthy Cooking") {
        document.getElementById("check-healthy").textContent = "✔";
    } else if (filterBy === "Herb & Spice Usage") {
        document.getElementById("check-herbs").textContent = "✔";
    } else if (filterBy === "Cleaning & Maintenance") {
        document.getElementById("check-cleaning").textContent = "✔";
    } else if (filterBy === "Leftover Management") {
        document.getElementById("check-leftovers").textContent = "✔";
    }

    currentFilter = filterBy;

    // Add your filtering logic here, e.g., filter the items based on the selected category
}
