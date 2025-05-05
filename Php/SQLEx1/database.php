<?php
require 'config.php';

// Set up database connection
$databasePort = 3306;
$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, '', $databasePort);
$mysqli->set_charset('utf8mb4');

// Ensure database exists
$dbName = 'Grades';
$mysqli->query("CREATE DATABASE IF NOT EXISTS `$dbName`");
$mysqli->select_db($dbName);

// Ensure table exists
$tableSql = "CREATE TABLE IF NOT EXISTS Quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    score INT NOT NULL,
    quiz_date DATE NOT NULL,
    UNIQUE KEY unique_quiz (first_name, last_name, score, quiz_date)
) ENGINE=InnoDB";
$mysqli->query($tableSql);

// Only insert if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $required = ['first_name', 'last_name', 'score', 'quiz_date'];
    $valid = true;

    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $valid = false;
        }
    }

    if ($valid) {
        $first = $mysqli->real_escape_string(trim($_POST['first_name']));
        $last  = $mysqli->real_escape_string(trim($_POST['last_name']));
        $score = (int) $_POST['score'];
        $date  = $_POST['quiz_date'];

        $insSql = "INSERT IGNORE INTO Quizzes (first_name, last_name, score, quiz_date) 
                   VALUES ('$first', '$last', $score, '$date')";
        $mysqli->query($insSql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quiz Results</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            background: linear-gradient(135deg, #1e1e2f, #2e2f40);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        h2 {
            font-size: 20px;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 6px;
            margin-top: 30px;
        }

        .record {
            background: rgba(255, 255, 255, 0.07);
            border-left: 4px solid #00bfa6;
            padding: 12px 16px;
            margin: 10px 0;
            border-radius: 6px;
            color: #e0e0e0;
            font-size: 15px;
        }

        .record.empty {
            border-left: 4px solid #f44336;
            color: #f0bfbf;
            font-style: italic;
        }

        .back-link {
            display: block;
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #00bfa6;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        echo "<h2>All Quiz Records</h2>";
        $res1 = $mysqli->query("SELECT * FROM Quizzes");
        if ($res1 && $res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                echo "<div class='record'>{$row['first_name']} {$row['last_name']} - {$row['score']} on {$row['quiz_date']}</div>";
            }
        } else {
            echo "<div class='record empty'>No records found.</div>";
        }

        echo "<h2>Scores Less Than 70</h2>";
        $res2 = $mysqli->query("SELECT first_name, last_name, score FROM Quizzes WHERE score < 70");
        if ($res2 && $res2->num_rows > 0) {
            while ($row = $res2->fetch_assoc()) {
                echo "<div class='record'>{$row['first_name']} {$row['last_name']} - {$row['score']}</div>";
            }
        } else {
            echo "<div class='record empty'>No low scores found.</div>";
        }

        echo "<h2>Quizzes Taken Before Nov. 10, 2021</h2>";
        $res3 = $mysqli->query("SELECT first_name, last_name FROM Quizzes WHERE quiz_date < '2021-11-10'");
        if ($res3 && $res3->num_rows > 0) {
            while ($row = $res3->fetch_assoc()) {
                echo "<div class='record'>{$row['first_name']} {$row['last_name']}</div>";
            }
        } else {
            echo "<div class='record empty'>No quizzes before that date.</div>";
        }

        $mysqli->close();
        ?>

        <a href="form.html" class="back-link">← Back to Quiz Entry Form</a>
    </div>
</body>

</html>