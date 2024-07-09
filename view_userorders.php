<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .order-table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['userId'])) {
        header("Location: signin.html");
        exit();
    }
    ?>
    <div class="container">
        <h1 class="text-center my-4">Your Orders</h1>
        <table class="table table-bordered order-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Delivery Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connect.php';

                $userId = $_SESSION['userId'];
                $sql = "SELECT * FROM orderstb WHERE userId = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['orderId']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['productName']) . "</td>";
                        echo "<td>" . number_format($row['quantity']) . "</td>";
                        echo "<td>PHP " . number_format($row['totalPrice'], 2) . "</td>";
                        echo "<td>" . htmlspecialchars($row['deliveryAddress']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No orders found.</td></tr>";
                }

                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
