        // Add an Array of more things you like
        let likes = ['reading', 'coding', 'hiking', 'photography']

        // Add Function to Show/Hide Extra Info on Button Click
        function revealExtraInfo() {
            const extraInfo = document.getElementById("extra-info");
            if (extraInfo.style.display === "none") {
                extraInfo.style.display = "block";
            } else {
                extraInfo.style.display = "none";
            }
        }

        // Add Function to display your additional interests
        function displayLikes() {
            const extraLikes = document.getElementById("extra-likes");
            extraLikes.textContent = likes.join(', ');
        }

        // Call the function to write the likes to the extra-info DOM when the page loads
        window.onload = function () {
            displayLikes();
        }

        // Add an effect using JS to manipulate the nav DOM elements
        const navLinks = document.querySelectorAll("nav ul li a");
        navLinks.forEach(link => {
            link.addEventListener("mouseover", function () {
                this.style.color = "#ff6347"; // Change to any color you like
            });
            link.addEventListener("mouseout", function () {
                this.style.color = "#fff"; // Revert back to the original color
            });
        });

