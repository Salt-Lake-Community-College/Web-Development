const btn = document.getElementById("jokeBtn");
const joke = document.getElementById("joke");
const error = document.getElementById("error");

btn.addEventListener("click", async () => {
  joke.textContent = "";
  error.textContent = "";

  try {
    const res = await fetch("https://icanhazdadjoke.com/", {
      headers: { Accept: "application/json" }
    });
    if (!res.ok) throw new Error("Joke not found");

    const data = await res.json();
    joke.textContent = data.joke;
  } catch (err) {
    error.textContent = "⚠️ Failed to load a joke. Try again.";
  }
});
