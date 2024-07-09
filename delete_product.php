<?php
// Include your database connection file
require_once('db_connect.php');

// Check if productId is set in the URL and is numeric
if (isset($_GET['productId']) && is_numeric($_GET['productId'])) {
    // Escape productId for security
    $productId = mysqli_real_escape_string($conn, $_GET['productId']);

    // Query to delete product
    $deleteQuery = "DELETE FROM products WHERE productId = '$productId'";

    // Perform the delete query
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "Invalid product ID provided";
}

header("Location: seller-dashboard-products.php");

// Close database connection
mysqli_close($conn);
?>

