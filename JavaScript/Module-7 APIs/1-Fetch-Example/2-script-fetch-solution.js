// Step 1: Get references to the HTML elements
const btn = document.getElementById("searchBtn");     // Search button
const input = document.getElementById("searchInput"); // Text input
const result = document.getElementById("result");     // Where we show the result
const error = document.getElementById("error");       // Where we show errors

// Step 2: Add a click event listener to the button
btn.addEventListener("click", () => {
  // Step 3: Clear previous result and error messages
  result.innerHTML = "";
  error.innerHTML = "";

  // Step 4: Get the name entered by the user, convert to lowercase and remove spaces
  const name = input.value.toLowerCase().trim();

  // Step 5: If name entered by the user is empty, show error and stop
  if (!name) {
    error.innerHTML = "Please enter a Pokémon name.";
    return;
  }

  // Step 6: Use fetch to get data from the API
  // API URL format: https://pokeapi.co/api/v2/pokemon/POKEMON_NAME
  // Replace POKEMON_NAME with the cleaned user input
  fetch(`https://pokeapi.co/api/v2/pokemon/${name}`)
    .then(response => {
      // Step 7: Check if response is OK (status 200-299)
      if (!response.ok) {
        throw new Error("Pokémon not found");
      }
      // Step 8: Convert the response to JSON (this returns another promise)
      return response.json();
    })
    .then(data => {
      // Step 9: Use the data to show Pokémon info
      result.textContent = `Name: ${data.name}, Height: ${data.height}, Weight: ${data.weight}`;
    })
    .catch(() => {
      // Step 10: If any error happens (bad name or network), show error message
      error.textContent = "❌ Pokémon not found. Check the name and try again.";
    });
});
