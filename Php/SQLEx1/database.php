<?php
require 'config.php';

// Create Connection using variables from config.php
$databasePort = 3306; // Default MySQL port, change if necessary

$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, '', $databasePort);
$mysqli->set_charset('utf8mb4');

// Create database 'Grades' if it doesn't exist
$dbName = 'Grades';
$mysqli->query("CREATE DATABASE IF NOT EXISTS `$dbName`");

// Select the database
$mysqli->select_db($dbName);

// Create table 'Quizzes' if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS Quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    score INT NOT NULL,
    quiz_date DATE NOT NULL,
    UNIQUE KEY unique_quiz (first_name, last_name, score, quiz_date)
) ENGINE=InnoDB";
$mysqli->query($tableSql);

// Validate form input
$required = ['first_name', 'last_name', 'score', 'quiz_date'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        exit;
    }
}

// Trim retrieved strings from form and assign
$first = $mysqli->real_escape_string(trim($_POST['first_name']));
$last  = $mysqli->real_escape_string(trim($_POST['last_name']));
$score = (int) $_POST['score'];
$date  = $_POST['quiz_date'];

// Insert record (ignore duplicates)
$insSql = "INSERT IGNORE INTO Quizzes (first_name, last_name, score, quiz_date) VALUES 
    ('$first', '$last', $score, '$date')";
$mysqli->query($insSql);

// ---- Query 1: All records ----
echo "<h2>All Quiz Records</h2>";
$res1 = $mysqli->query("SELECT * FROM Quizzes");

// Validate if there is a response and echo every row of response 
if ($res1 && $res1->num_rows > 0) {
    while ($row = $res1->fetch_assoc()) {
        echo "{$row['first_name']} {$row['last_name']} - {$row['score']} on {$row['quiz_date']}<br>";
    }
}
echo "<br>";

// ---- Query 2: Scores < 70 ----
echo "<h2>Scores Less Than 70</h2>";
$res2 = $mysqli->query("SELECT first_name, last_name, score FROM Quizzes WHERE score < 70");
if ($res2 && $res2->num_rows > 0) {
    while ($row = $res2->fetch_assoc()) {
        echo "{$row['first_name']} {$row['last_name']} - {$row['score']}<br>";
    }
}
echo "<br>";

// ---- Query 3: Before Nov. 10, 2021 ----
echo "<h2>Quizzes Taken Before Nov. 10, 2021</h2>";
$res3 = $mysqli->query("SELECT first_name, last_name FROM Quizzes WHERE quiz_date < '2021-11-10'");
if ($res3 && $res3->num_rows > 0) {
    while ($row = $res3->fetch_assoc()) {
        echo "{$row['first_name']} {$row['last_name']}<br>";
    }
}

$mysqli->close();
