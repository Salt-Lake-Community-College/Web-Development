// Step 1: Get references to the HTML elements
// - Search button
// - Text input
// - Where we show the result
// - Where we show errors

// Step 2: Add a click event listener to the button

  // Step 3: Clear previous result and error messages

  // Step 4: Get the name entered by the user, convert to lowercase and remove spaces
  // Hint we can use .toLowerCase() and .trim() to accomplish this

  // Step 5: If name entered by the user is empty, show error and stop

  // Step 6: Use fetch to get data from the API
  // API URL format: https://pokeapi.co/api/v2/pokemon/POKEMON_NAME
  // Replace POKEMON_NAME with the cleaned user input

      // Step 7: Check if response is OK (status 200-299)
  
      // Step 8: Convert the response to JSON (this returns another promise)

      // Step 9: Use the data to show Pokémon info

      // Step 10: If any error happens (bad name or network), show error message
