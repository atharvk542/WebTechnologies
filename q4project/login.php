<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user["password"])) {
            // Password is correct, start a new session
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            // Redirect to the quiz page
            header("location: quiz.php");
        } else {
            // Password is incorrect
            echo "Invalid username or password.";
        }
    } else {
        // Username doesn't exist
        echo "Invalid username or password.";
    }

    $stmt->close();
}
