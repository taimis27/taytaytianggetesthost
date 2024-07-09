<?php
session_start();
require 'db_connect.php'; // Make sure db_connect.php is correctly included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input (sanitize as needed)
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Prepare statement to retrieve user details
    $stmt = $conn->prepare("SELECT userId, emailAddress, password FROM registration WHERE emailAddress = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($userId, $emailAddress, $hashed_password);
        $stmt->fetch();
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Save login details to the login_details table
            $login_stmt = $conn->prepare("INSERT INTO login (userId, emailAddress, password) VALUES (?, ?, ?)");
            $login_stmt->bind_param("iss", $userId, $emailAddress, $hashed_password);
            $login_stmt->execute();
            $login_stmt->close();
            
            // Store user ID in session
            $_SESSION['userId'] = $userId;
            header("Location: Home.php");
            exit();

        
        } else {
            // Incorrect password
            $error_message = "Incorrect email or password.";
        }
    } else {
        // Email not found
        $error_message = "Incorrect email or password.";
    }

    header("Location: Home.php");
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>