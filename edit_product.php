<?php
// Database connection (adjust with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taytaytiangge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $productName = $conn->real_escape_string($_POST['EditProductName']);
    $productPrice = $conn->real_escape_string($_POST['EditProductPrice']);
    $productSale = $conn->real_escape_string($_POST['EditProductSale']);
    $productStocks = $conn->real_escape_string($_POST['EditProductStocks']);

    // Check if file is uploaded
    if (isset($_FILES["EditProductImage"]) && $_FILES["EditProductImage"]["error"] == UPLOAD_ERR_OK) {
        // File upload handling
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["EditProductImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["EditProductImage"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["EditProductImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Create the uploads directory if it doesn't exist
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true); // Create directory with full permissions (0777)
            }

            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["EditProductImage"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, now update data in the database
                $sql = "UPDATE products SET 
                        product_price = '$productPrice', 
                        product_sale = '$productSale', 
                        product_stock = '$productStocks', 
                        product_image = '$targetFile' 
                        WHERE product_name = '$productName'";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // If no file is uploaded, update other fields only
        $sql = "UPDATE products SET 
                product_price = '$productPrice', 
                product_sale = '$productSale', 
                product_stock = '$productStocks'
                WHERE product_name = '$productName'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Redirect back to the dashboard
header("Location: seller-dashboard-products.php");

// Close database connection
$conn->close();
?>
