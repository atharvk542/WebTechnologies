-- Create the database
CREATE DATABASE IF NOT EXISTS quiz_system DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE quiz_system;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    quiz_attempts INT DEFAULT 0,
    best_score INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);