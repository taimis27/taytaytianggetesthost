<?php
session_start();

// Database connection (adjust with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taytaytiangge";

$sellerId = $_SESSION['sellerId'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $productName = $conn->real_escape_string($_POST['productName']);
    $productPrice = $conn->real_escape_string($_POST['productPrice']);
    $productSale = $conn->real_escape_string($_POST['productSale']);
    $productStocks = $conn->real_escape_string($_POST['productStocks']);

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["productImage"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now insert data into database
            $sql = "INSERT INTO products (sellerId, product_name, product_price, product_sale, product_stock, product_image)
                    VALUES ($sellerId, '$productName', '$productPrice', '$productSale', '$productStocks', '$targetFile')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";

                header("Location: seller-dashboard-products.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

header("Location: seller-dashboard-products.php");

$conn->close();
?>

