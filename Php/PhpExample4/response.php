<?php
$name = $_POST['name'] ?? '';
$q1 = $_POST['q1'] ?? '';
$q2 = $_POST['q2'] ?? '';
$q3 = $_POST['q3'] ?? '';

$score = 0;

// Validate all fields filled
if (!$name || !$q1 || !$q2 || !$q3) {
    echo "<body style='background-color: #555; color: white; text-align: center; font-family: Verdana; font-size: 18px;'>";
    echo "<h2>Please complete all fields before submitting!</h2>";
    echo "<a href='form.html' style='color: yellow;'>Go back to quiz</a>";
    echo "</body>";
    exit;
}

// Validate name only contains letters and spaces
if (!preg_match("/^[A-Za-z ]+$/", $name)) {
    echo "<body style='background-color: #555; color: white; text-align: center; font-family: Verdana; font-size: 18px;'>";
    echo "<h2 style='color: red;'>Name can only contain letters and spaces.</h2>";
    echo "<a href='form.html' style='color: yellow;'>Go back to quiz</a>";
    echo "</body>";
    exit;
}

// Answer key
if ($q1 == 'a') $score++;
if ($q2 == 'a') $score++;
if ($q3 == 'a') $score++;

$totalQuestions = 3;
$percentage = ($score / $totalQuestions) * 100;

echo "<body style='background-color: #555; color: white; text-align: center; font-family: Verdana; font-size: 18px;'>";

if ($percentage >= 70) {
    echo "<h1 style='color: lightgreen;'>🎉 Congratulations! 🎉</h1>";
    echo "<p>Well done <strong>" . htmlspecialchars($name) . "</strong>, with a score of <strong>" . round($percentage, 1) . "%</strong>, you have passed the exam.</p>";
    echo "<p><a href='certificate.php?name=" . urlencode($name) . "'>Click here</a> to view your certificate.</p>";
} else {
    echo "<h1>😢 Sorry!</h1>";
    echo "<p>You need to score at least 70% to pass the exam. Better luck next time!</p>";
    echo "<img src='sadge.png' alt='Sad Face' width='150'><br>";
    echo "<p><a href='review.html' style='color: lightblue;'>Review Material</a></p>";
    echo "<form action='form.html'><button type='submit'>Go Back</button></form>";
}

echo "</body>";
?>