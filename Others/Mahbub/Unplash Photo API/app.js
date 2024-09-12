document.getElementById("searchInput").addEventListener("input", function () {
   const query = this.value;
   if (query) {
      fetchImages(query);
   } else {
      document.getElementById("imageContainer").innerHTML = ""; // Clear images if input is empty
      document.querySelector(".img-link").textContent = ""; // Clear the link paragraph
   }
});

function fetchImages(query) {
   const unsplashAccessKey = "1M1z_bPvJVrEoO9vtt1DR0wPwyMtj_kPJbr0Ljju2o8";
   const url = `https://api.unsplash.com/search/photos?query=${encodeURIComponent(
      query
   )}&client_id=${unsplashAccessKey}&per_page=5`; // change the number of image in a page

   fetch(url)
      .then((response) => response.json())
      .then((data) => {
         const imageContainer = document.getElementById("imageContainer");
         imageContainer.innerHTML = "";

         data.results.forEach((image) => {
            const imgElement = document.createElement("img");
            imgElement.src = image.urls.small;
            imgElement.alt = image.alt_description || "Unsplash Image";
            imgElement.addEventListener("click", function () {
               document.querySelector(".img-link").textContent = imgElement.src; // Store the direct image link
            });
            imageContainer.appendChild(imgElement);
         });
      })
      .catch((error) => console.error("Error fetching images:", error));
}
