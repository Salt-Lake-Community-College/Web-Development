document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("survey-form");
    const responseDiv = document.getElementById("form-response");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        // Validate inputs
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const age = document.getElementById("age").value.trim();
        const gender = document.querySelector('input[name="gender"]:checked');
        const interests = Array.from(document.querySelectorAll('input[name="interests"]:checked')).map(interest => interest.value);
        const country = document.getElementById("country").value;
        const comments = document.getElementById("comments").value.trim();

        if (!name || !email || !age || !gender) {
            alert("Please fill in all required fields.");
            return;
        }

        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        // Display success message
        responseDiv.textContent = "Thank you for your submission!";
        responseDiv.style.display = "block";

        // Optionally, clear the form
        form.reset();
    });

    // Email validation function
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
});
