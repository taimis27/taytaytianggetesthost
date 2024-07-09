<?php
    session_start();
    if (!isset($_SESSION['userId'])) {
        header("Location: signin.html");
        exit();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-card {
            margin-bottom: 20px;
        }
        .product-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Browse Products</h1>
        <div class="row">
            <?php
            include 'db_connect.php';

            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 product-card">';
                    echo '<div class="card">';
                    echo '<img src="' . htmlspecialchars($row['product_image']) . '" class="card-img-top product-image" alt="' . htmlspecialchars($row['product_name']) . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['product_name']) . '</h5>';
                    echo '<p class="card-text">Price: PHP ' . number_format($row['product_price'], 2) . '</p>';
                    echo '<p class="card-text">Total Sales: ' . number_format($row['product_sale']) . '</p>';
                    echo '<p class="card-text">Available Stocks: ' . number_format($row['product_stock']) . '</p>';
                    echo '<form action="order_product.php" method="POST" class="mt-auto">';
                    echo '<input type="hidden" name="product_id" value="' . $row['productId'] . '">';
                    echo '<input type="hidden" name="product_name" value="' . htmlspecialchars($row['product_name']) . '">';
                    echo '<div class="form-group">';
                    echo '<label for="buyerName">Name:</label>';
                    echo '<input type="text" class="form-control" name="buyerName" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="deliveryAddress">Delivery Address:</label>';
                    echo '<input type="text" class="form-control" name="deliveryAddress" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="quantity">Quantity:</label>';
                    echo '<input type="number" class="form-control" name="quantity" min="1" max="' . $row['product_stock'] . '" required>';
                    echo '</div>';
                    echo '<div class="text-center">';
                    echo '<button type="submit" class="btn btn-primary">Order</button>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No products available.</p>';
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
