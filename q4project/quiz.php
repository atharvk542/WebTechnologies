<?php
session_start();
require_once 'config.php';

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz System - Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
        <div class="quiz-info">
            <p>This is a placeholder for the quiz page, which will be implemented in the next phase.</p>
            <p>You have successfully logged in!</p>
        </div>

        <div class="logout-section">
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>

</html>