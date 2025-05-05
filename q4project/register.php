<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "Please fill in all fields.";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "This username is already taken.";
        exit;
    }
    $stmt->close();

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "This email is already registered.";
        exit;
    }
    $stmt->close();

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, quiz_attempts) VALUES (?, ?, ?, 0)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to login page
        header("location: index.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
