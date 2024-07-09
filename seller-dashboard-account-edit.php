<?php
session_start();
require 'db_connect.php'; // Make sure db_connect.php is correctly included

// Fetch seller details if logged in
$sellerId = $_SESSION['sellerId'];
if ($sellerId) {
    $stmt = $conn->prepare("SELECT businessName, email, phoneNumber, facebook, ownerName, ownerEmail, ownerPhoneNumber FROM sellerDetails WHERE sellerId = ?");
    $stmt->bind_param("i", $sellerId);
    $stmt->execute();
    $stmt->bind_result($businessName, $email, $phoneNumber, $facebook, $ownerName, $ownerEmail, $ownerPhoneNumber);
    $stmt->fetch();
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $businessName = $_POST['businessName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $facebook = $_POST['facebook'];
    $ownerName = $_POST['ownerName'];
    $ownerEmail = $_POST['ownerEmail'];
    $ownerPhoneNumber = $_POST['ownerPhoneNumber'];

    $stmt = $conn->prepare("REPLACE INTO sellerDetails (sellerId, businessName, email, phoneNumber, facebook, ownerName, ownerEmail, ownerPhoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $sellerId, $businessName, $email, $phoneNumber, $facebook, $ownerName, $ownerEmail, $ownerPhoneNumber);
    $stmt->execute();
    $stmt->close();

    // Redirect to avoid form resubmission
    header("Location: seller-dashboard-account.php");
    exit();
}