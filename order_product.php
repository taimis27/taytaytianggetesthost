<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['userId'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $buyerName = $_POST['buyerName'];
    $deliveryAddress = $_POST['deliveryAddress'];
    $quantity = $_POST['quantity'];

    // Get product details
    $sql = "SELECT * FROM products WHERE productId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        if ($quantity <= $product['product_stock']) {
            // Calculate total price
            $total_price = $quantity * $product['product_price'];

            // Update available stocks and total sales
            $new_stocks = $product['product_stock'] - $quantity;
            $new_sales = $product['product_sale'] + $quantity;

            $update_sql = "UPDATE products SET product_stock = ?, product_sale = ? WHERE productId = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("iii", $new_stocks, $new_sales, $product_id);
            if ($update_stmt->execute()) {
                // Insert the order into the orderstb table
                $order_sql = "INSERT INTO orderstb (userId, productId, productName, buyerName, quantity, totalPrice, deliveryAddress, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $status = "To Ship";
                $order_stmt = $conn->prepare($order_sql);
                $order_stmt->bind_param("iissidss", $userId, $product_id, $product_name, $buyerName, $quantity, $total_price, $deliveryAddress, $status);
                if ($order_stmt->execute()) {
                    echo "Order placed successfully!";
                    header("Location: browse_products.php");
                } else {
                    echo "Error placing order: " . $conn->error;
                }
            } else {
                echo "Error updating product: " . $conn->error;
            }
        } else {
            echo "Not enough stock available.";
        }
    } else {
        echo "Product not found.";
    }

    $stmt->close();
}

$conn->close();
?>
