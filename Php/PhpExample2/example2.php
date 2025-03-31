<?php

// ----- 1. Function to generate random number and print a day message -----
function number() {
    $num = rand(1, 5);
    $string = "The number generated is $num so ";
    switch ($num) {
        
        case 1:
            echo "Today is A day.<br>";
            break;
        case 2:
            echo "Today is B day.<br>";
            break;
        case 3:
            echo "Today is C day.<br>";
            break;
        case 4:
            echo "Today is D day.<br>";
            break;
        case 5:
            echo "Today is E day.<br>";
            break;
        default:
            echo "Invalid number.<br>";
            break;
    }
}

// Call the number() function
number();

// ----- 2. Functions to reverse a string -----
// Version 1: Using built-in strrev()
function reverse_builtin($str) {
    echo "<strong>Reverse using built-in function:</strong><br>";
    echo "Original string: " . $str . "<br>";
    echo "Reversed string: " . strrev($str) . "<br><br>";
}

// Version 2: Manually reversing the string
function reverse_manual($str) {
    $reversed = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    echo "<strong>Reverse using manual loop:</strong><br>";
    echo "Original string: " . $str . "<br>";
    echo "Reversed string: " . $reversed . "<br><br>";
}

// Call both reverse functions with a sample string
$sampleString = "Hello World!";
reverse_builtin($sampleString);
reverse_manual($sampleString);

// ----- 3. Loop Exercises -----
echo "<br><h2>Loop Exercises Output</h2>";

// a) "abc" row using a while loop
$i = 0;
while ($i < 9) {
    echo "abc ";
    $i++;
}
echo "<br>";

// b) "xyz" row using a do-while loop
$j = 0;
do {
    echo "xyz ";
    $j++;
} while ($j < 9);
echo "<br>";

// c) "1 2 3 4 5 6 7 8 9" row using a for loop
for ($k = 1; $k <= 9; $k++) {
    echo $k . " ";
}
echo "<br>";

// ----- 4. Embedded HTML List -----
echo "<div>";
echo "<br><h2>HTML List</h2>";
echo "<ol>";
$items = array("Item A", "Item B", "Item C", "Item D", "Item E", "Item F");
foreach ($items as $item) {
    echo "<li>$item</li>";
}
echo "</ol>";
echo "</div>";

// ----- 5. Password Generator -----
// This function creates a password meeting the following criteria:
// - At least one uppercase letter, one lowercase letter, one number, one special character.
// - At least 8 characters long.
// - Uses string functions (e.g., str_shuffle) instead of rand().
function generatePassword() {
    $upper   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lower   = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $special = '!@#$%^&*()';

    // Ensure each category contributes at least one character
    $password = '';
    $password .= substr(str_shuffle($upper), 0, 1);
    $password .= substr(str_shuffle($lower), 0, 1);
    $password .= substr(str_shuffle($numbers), 0, 1);
    $password .= substr(str_shuffle($special), 0, 1);

    // Fill the remaining 4 characters (to make a minimum of 8 characters)
    $all = $upper . $lower . $numbers . $special;
    $password .= substr(str_shuffle($all), 0, 4);

    // Shuffle the resulting password to mix the guaranteed characters
    return str_shuffle($password);
}

echo "<br><h2>Generated Passwords</h2>";
// Print 10 passwords meeting the required characteristics
for ($p = 0; $p < 10; $p++) {
    echo generatePassword() . "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Exercise</title>
    <!-- Internal CSS for simple styling -->
    <style>
        body {
            background-color:rgb(181, 181, 181); /* Pastel Red */
            color: white;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        ol {
    list-style-type: decimal; /* Ensures numbers appear */
    display: inline-block; /* Keeps the list centered */
    text-align: left; /* Ensures text and numbers align properly */
    padding-left: 0; /* Removes unwanted left padding */
}
li {
    margin: 5px 0;
}

    </style>
</head>
<body>
    <!-- The PHP script outputs its content above -->
</body>
</html>
