<?php
// Start session
session_start();

// Check if user is already logged in, redirect to dashboard if true
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

// Include database connection file
require_once 'db_connection.php';

// Check if login form is submitted
if (isset($_POST['submit'])) {
    // Retrieve input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to check if user exists in database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and password is correct
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variable and redirect to dashboard
            $_SESSION['user_id'] = $row['id'];
            header('Location: dashboard.php');
            exit;
        }
    }

    // Set error message if login is unsuccessful
    $error_message = 'Invalid username or password';
    print_r ($_POST);
    print_r ($_SESSION);
}

?>