let currentSort = "Name";

function changeSort(sortBy) {
  const sortButton = document.getElementById("sortDropdown");

  sortButton.textContent = "Sorted by: " + sortBy;

  document.getElementById("check-name").textContent = "";
  document.getElementById("check-recent").textContent = "";
  document.getElementById("check-popularity").textContent = "";

  if (sortBy === "Name") {
    document.getElementById("check-name").textContent = "✔";
  } else if (sortBy === "Recently Added") {
    document.getElementById("check-recent").textContent = "✔";
  } else if (sortBy === "Popularity") {
    document.getElementById("check-popularity").textContent = "✔";
  }

  currentSort = sortBy;
}
