<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Hero Generator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Super Hero Generator</h1>
    </header>
    <main>
        <form method="post">
            <button type="submit" name="generate">Generate Super Hero</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate'])) {
            // Arrays of sentence fragments
            $heroAdjectives = ["Amazing", "Incredible", "Mighty", "Fantastic", "Invincible"];
            $heroNouns = ["Panther", "Warrior", "Titan", "Shadow", "Phoenix"];
            $powers = ["flight", "super strength", "invisibility", "telekinesis", "speed"];
            $missions = ["protect the city", "save the world", "fight injustice", "defend the weak", "uphold peace"];

            // Function to generate a random superhero name and description
            function generateSuperHero($adjectives, $nouns, $powers, $missions) {
                $adjective = $adjectives[array_rand($adjectives)];
                $noun = $nouns[array_rand($nouns)];
                $power = $powers[array_rand($powers)];
                $mission = $missions[array_rand($missions)];

                $heroName = "$adjective $noun";
                $heroDescription = "This super hero has the power of $power and their mission is to $mission.";

                return [$heroName, $heroDescription];
            }

            list($heroName, $heroDescription) = generateSuperHero($heroAdjectives, $heroNouns, $powers, $missions);

            // Display Super Hero Name & Description
            echo "<section id='superhero-display'>
                    <h2 id='hero-name'>$heroName</h2>
                    <p id='hero-description'>$heroDescription</p>
                  </section>";
        }
        ?>
    </main>
</body>
</html>
