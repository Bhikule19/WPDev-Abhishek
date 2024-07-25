function myNotes() {
  const deleteButton = document.querySelector(".delete-note");
  if (deleteButton) {
    deleteButton.addEventListener("click", deleteNote);
  }

  // Delete note function
  function deleteNote(event) {
    const url = `${universityData.root_url}/wp-json/wp/v2/note/92`;

    // Define the options for the fetch request, including method and headers
    const options = {
      method: "DELETE",
      headers: {
        "X-WP-Nonce": universityData.nonce, //AJAX Request: Using fetch for the DELETE request, including the nonce in the headers.
      },
    };

    fetch(url, options)
      .then((response) => {
        // Check if the response is ok (status code 200-299)
        if (!response.ok) {
          return response.json().then((errorInfo) => Promise.reject(errorInfo));
        }
        return response.json();
      })
      .then((data) => {
        console.log("Congrats");
        console.log(data);
      })
      .catch((error) => {
        console.log("Sorry");
        console.log(error);
      });
  }
}

export default myNotes;
