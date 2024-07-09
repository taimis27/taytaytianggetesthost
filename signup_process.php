<?php
require 'db_connect.php'; // Make sure db_connect.php is correctly included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input (sanitize as needed)
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare statement (use CURDATE() for the dateCreated field)
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, username, emailAddress, password, dateCreated) VALUES (?, ?, ?, ?, ?, CURDATE())");
    $stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $hashed_password);
    
    // Execute statement
    if ($stmt->execute()) {
        // Redirect back to the signup page with success message
        header("Location: signin.html?status=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

