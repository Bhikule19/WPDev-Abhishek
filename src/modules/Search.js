// Function to initialize the search overlay functionality
function initializeSearch() {
  // Select the necessary DOM elements
  const openButtons = document.querySelectorAll(".js-search-trigger");
  const closeButton = document.querySelector(".search-overlay__close");
  const searchOverlay = document.querySelector(".search-overlay");
  const searchField = document.querySelector(".search-term");
  const resultsDiv = document.getElementById("search-overlay__results");
  const body = document.querySelector("body");
  let isOverlay = false;
  let debouncingSearch; // Declare debounce variable

  // Function to open the search overlay
  function openOverlay() {
    searchOverlay.classList.add("search-overlay--active");
    body.classList.add("body-no-scroll");
    isOverlay = true; // Set isOverlay to true when the overlay is opened
  }

  // Function to close the search overlay
  function closeOverlay() {
    searchOverlay.classList.remove("search-overlay--active");
    body.classList.remove("body-no-scroll");
    isOverlay = false; // Set isOverlay to false when the overlay is closed
  }

  // Attach event listeners to the open buttons
  openButtons.forEach((button) => {
    button.addEventListener("click", openOverlay);
  });

  // Attach event listener to the close button
  closeButton.addEventListener("click", closeOverlay);

  // Attach keyboard event listener to the document
  document.addEventListener("keydown", (e) => {
    if ((e.key === "S" || e.key === "s") && !isOverlay) {
      openOverlay();
      console.log("Open overlay");
    }
    if (e.key === "Escape" && isOverlay) {
      closeOverlay();
      console.log("Close overlay");
    }
  });

  // Function to handle debounced search results
  function debouncingSearchResults() {
    if (resultsDiv) {
      resultsDiv.innerHTML = "Search";
    } else {
      console.error("Element with ID 'search-overlay__results' not found.");
    }
  }

  // Implementing Debouncing
  if (searchField) {
    searchField.addEventListener("keydown", (e) => {
      clearTimeout(debouncingSearch); // Clear previous timeout before setting a new one
      debouncingSearch = setTimeout(debouncingSearchResults, 3000);
    });
  } else {
    console.error("Element with ID 'search-overlay__input' not found.");
  }
}

// Export the function
export default initializeSearch;
