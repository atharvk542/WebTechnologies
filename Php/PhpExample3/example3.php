<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arrays in PHP - Assignment</title>
    <style>
        /* Overall page styling */
        body {
            margin: 0;
            padding: 0;
            background-color: #ccffcc; /* light green background */
            text-align: center;        /* center all text/content */
            color: #0000ff;           /* blue text */
            font-family: Arial, sans-serif;
            font-size: 14px;          /* smallish font size */
        }

        /* Container to limit the width a bit, if desired */
        .container {
            width: 80%;
            margin: 0 auto; /* center the container */
            padding: 10px;
        }

        /* Headings styling */
        h1, h2, h3 {
            margin: 10px 0;
        }

        /* Sections with a little spacing */
        .section {
            margin: 20px auto;
            padding: 10px;
        }

        /* Table styling */
        table {
            margin: 10px auto;
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #666;
            padding: 8px;
        }
        th {
            background-color: #eee; /* a light grey for header cells */
        }

        /* Pastel background colors for each row in the color table */
        /* (You can tweak these color codes as needed) */
        .red-row {
            background-color: #ffcccc;
        }
        .green-row {
            background-color: #ccffcc;
        }
        .blue-row {
            background-color: #ccccff;
        }
        .yellow-row {
            background-color: #ffffcc;
            color: #000; /* dark text for contrast */
        }
        .purple-row {
            background-color: #e6ccff;
        }

        /* Preformatted text block for print_r / var_dump output */
        pre {
            background: #f0f0f0;
            border: 1px solid #999;
            display: inline-block;
            text-align: left; /* keep the alignment left for code dumps */
            padding: 8px;
            margin: 10px auto;
        }

        /* Lists margin/padding adjustments (optional) */
        ul, ol {
            display: inline-block; /* center the list as well */
            text-align: left;
            margin: 10px auto;
            padding-left: 40px;
        }

        /* Bold text in paragraphs for emphasis */
        strong {
            color: #ff0000; /* red highlight for emphasis */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Arrays in PHP Assignment</h1>

        <!-- Exercise 1: Weather Conditions -->
        <div class="section">
            <h2>Exercise 1: Weather Conditions</h2>
            <?php
            // Creating an array of weather conditions
            $weather = array("rain", "sunshine", "clouds", "hail", "sleet", "snow", "wind");

            echo "<p>We've seen all kinds of weather this month. At the beginning of the month, we had <strong>{$weather[5]}</strong> and <strong>{$weather[6]}</strong>. Then came <strong>{$weather[1]}</strong> with a few <strong>{$weather[2]}</strong> and some <strong>{$weather[0]}</strong>. At least we didn't get any <strong>{$weather[3]}</strong> or <strong>{$weather[4]}</strong>.</p>";
            ?>
        </div>

        <!-- Exercise 2: Largest Cities -->
        <div class="section">
            <h2>Exercise 2: Largest Cities</h2>
            <?php
            // Creating an array with ten cities
            $cities = array("Tokyo", "Mexico City", "New York City", "Mumbai", "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo", "London");

            echo "<h3>Original Array (print_r):</h3>";
            echo "<pre>";
            print_r($cities);
            echo "</pre>";

            echo "<h3>Original Array (var_dump):</h3>";
            echo "<pre>";
            var_dump($cities);
            echo "</pre>";

            // Printing the cities separated by commas using foreach loop
            echo "<h3>Cities separated by commas:</h3>";
            echo "<p>" . implode(", ", $cities) . "</p>";

            // Sorting the array and printing as an unordered list
            sort($cities);
            echo "<h3>Sorted Cities (Unordered List):</h3>";
            echo "<ul>";
            foreach($cities as $city) {
                echo "<li>" . $city . "</li>";
            }
            echo "</ul>";

            // Adding additional cities
            $additionalCities = array("Los Angeles", "Calcutta", "Osaka", "Beijing");
            $cities = array_merge($cities, $additionalCities);
            sort($cities);
            echo "<h3>Sorted Cities with Additional Entries (Ordered List):</h3>";
            echo "<ol>";
            foreach($cities as $city) {
                echo "<li>" . $city . "</li>";
            }
            echo "</ol>";
            ?>
        </div>

        <!-- Exercise 3: Shortest and Longest String Length -->
        <div class="section">
            <h2>Exercise 3: Shortest and Longest City Name Length</h2>
            <?php
            // Finding the shortest and longest string lengths in the $cities array
            $minLength = null;
            $maxLength = null;
            $shortestCity = "";
            $longestCity = "";
            foreach($cities as $city) {
                $length = strlen($city);
                if (is_null($minLength) || $length < $minLength) {
                    $minLength = $length;
                    $shortestCity = $city;
                }
                if (is_null($maxLength) || $length > $maxLength) {
                    $maxLength = $length;
                    $longestCity = $city;
                }
            }
            echo "<p>The city with the shortest name is <strong>" . $shortestCity . "</strong> with " . $minLength . " characters.</p>";
            echo "<p>The city with the longest name is <strong>" . $longestCity . "</strong> with " . $maxLength . " characters.</p>";
            ?>
        </div>

        <!-- Exercise 4: Colors Table -->
        <div class="section">
            <h2>Exercise 4: Colors Table</h2>
            <?php
            // Creating an array of colors
            $colors = array("Red", "Green", "Blue", "Yellow", "Purple");

            echo "<table>";
            echo "<tr><th>Color Name</th><th>Sample</th></tr>";
            // For each color, pick a pastel background color
            foreach($colors as $color) {
                // We'll map each color to a pastel row class:
                $rowClass = "";
                switch (strtolower($color)) {
                    case "red":    $rowClass = "red-row";    break;
                    case "green":  $rowClass = "green-row";  break;
                    case "blue":   $rowClass = "blue-row";   break;
                    case "yellow": $rowClass = "yellow-row"; break;
                    case "purple": $rowClass = "purple-row"; break;
                }

                echo "<tr class='$rowClass'>";
                echo "<td>" . $color . "</td>";
                echo "<td>" . $color . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>

        <!-- Exercise 5: Random Temperatures -->
        <div class="section">
            <h2>Exercise 5: Random High Temperatures Analysis</h2>
            <?php
            // Populate an array with 50 random numbers between 40 and 90
            $temperatures = array();
            for ($i = 0; $i < 50; $i++) {
                $temperatures[] = rand(40, 90);
            }

            // Calculations using array functions
            $sumTemps = array_sum($temperatures);
            $numTemps = count($temperatures);
            $averageTemp = $sumTemps / $numTemps;

            // Remove duplicates and sort
            $uniqueTemps = array_unique($temperatures);
            sort($uniqueTemps);

            // Get five coolest (first five) and five warmest (last five) temperatures
            $coolestTemps = array_slice($uniqueTemps, 0, 5);
            $warmestTemps = array_slice($uniqueTemps, -5);

            echo "<h3>Temperature Statistics</h3>";
            echo "<p><strong>Average High Temperature:</strong> " . number_format($averageTemp, 2) . "°</p>";
            echo "<p><strong>Total Number of Temperatures:</strong> " . $numTemps . "</p>";
            echo "<p><strong>Sum of Temperatures:</strong> " . $sumTemps . "</p>";

            echo "<h3>Five Coolest Temperatures:</h3>";
            echo "<p>" . implode(", ", $coolestTemps) . "</p>";

            echo "<h3>Five Warmest Temperatures:</h3>";
            echo "<p>" . implode(", ", $warmestTemps) . "</p>";
            ?>
        </div>
    </div>
</body>
</html>
