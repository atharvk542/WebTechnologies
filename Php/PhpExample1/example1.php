<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Exercise 1</title>
    <style>
        body {
            background-color:rgb(164, 104, 115); /* Pastel Red */
            color: white;
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <?php
    // PHP: Hypertext Preprocessor
    // Introduction to PHP

    // Exercise 1
    $name = 'Mario';
    echo "<h2>This is the first exercise:</h2>";
    echo "I am $name.<br>";

    // Exercise 2
    echo "<h2>This is the second exercise:</h2>";
    if ($name === 'Mario') {
        echo "I am $name.<br>";
    }

    // Exercise 3
    echo "<h2>This is the third exercise:</h2>";
    $name = 'awaken';
    if ($name === 'Mario') {
        echo "I am $name.<br>";
    } else {
        echo "No, no, no. That is not my name!<br>";
    }

    // Exercise 4
    echo "<h2>This is the fourth exercise:</h2>";
    $value = 8;
    echo "Value is now $value.<br>";
    $value += 2;
    echo "Add 2. Value is now $value.<br>";
    $value -= 4;
    echo "Subtract 4. Value is now $value.<br>";
    $value *= 5;
    echo "Multiply by 5. Value is now $value.<br>";
    $value /= 3;
    echo "Divide by 3. Value is now $value.<br>";
    $value++;
    echo "Increment value by one. Value is now $value.<br>";
    $value--;
    echo "Decrement value by one. Value is now $value.<br>";

    // Exercise 5
    echo "<h2>This is the fifth exercise:</h2>";
    $whatsit = "Hello";
    echo "Value is " . gettype($whatsit) . ".<br>";
    $whatsit = 3.14;
    echo "Value is " . gettype($whatsit) . ".<br>";
    $whatsit = true;
    echo "Value is " . gettype($whatsit) . ".<br>";
    $whatsit = 42;
    echo "Value is " . gettype($whatsit) . ".<br>";
    $whatsit = NULL;
    echo "Value is " . gettype($whatsit) . ".<br>";

    // Exercise 6
    echo "<h2>This is the sixth exercise:</h2>";
    echo "<b>Rules for variable names in PHP:</b> Variables must start with a $, can contain letters, numbers, and underscores, and cannot start with a number.<br>";
    echo "<b>Difference between echo and print:</b> Echo can take multiple parameters and has no return value, while print always returns 1.<br>";
    echo "<b>PHP is a loosely typed language:</b> True.<br>";
    echo "<b>Echo statements can be used with or without parentheses:</b> True.<br>";
    echo "<b>Differences between PHP and JavaScript:</b> PHP is server-side, while JavaScript is client-side. PHP requires a server to run, while JavaScript runs in the browser.<br>";
    ?>
</body>
</html>