<?php
// Include your database connection file
require('db_connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complete_order'])) {
    // Get orderId from POST data
    $orderId = $_POST['orderId'];

    // Update query to set status to "completed"
    $updateQuery = "UPDATE orderstb SET status = 'completed' WHERE orderId = $orderId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "Order marked as completed successfully.";
        // Optionally, you may redirect or reload the page after updating
        // header("Location: current_page.php");
        // exit();
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
}

// Query to fetch products
$query = "SELECT * FROM orderstb";
$result = mysqli_query($conn, $query);

// Check if query successful
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . number_format($row['orderId']) . "</td>";
        echo "<td>" . htmlspecialchars($row['buyerName']) . "</td>";
        echo "<td>" . htmlspecialchars($row['productName']) . "</td>";
        echo "<td>" . number_format($row['quantity']) . "</td>";
        echo "<td>PHP " . number_format($row['totalPrice'], 2) . "</td>"; // Display PHP before price
        echo "<td>" . htmlspecialchars($row['deliveryAddress']) . "</td>";
        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='orderId' value='" . $row['orderId'] . "'>";
        echo "<button type='submit' name='complete_order'>Complete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error fetching orders: " . mysqli_error($conn);
}

// Close database connection (if necessary, but ensure it's not closed prematurely)
mysqli_close($conn);
?>
