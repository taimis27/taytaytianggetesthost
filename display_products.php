<?php
// Include your database connection file
require_once('db_connect.php');

// Query to fetch products
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// Check if query successful
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
        echo "<td>PHP " . number_format($row['product_price'], 2) . "</td>"; // Display PHP before price
        echo "<td>" . $row['product_sale'] . "</td>";
        echo "<td>" . $row['product_stock'] . "</td>";
        
  // Displaying the product image if available
  echo "<td>";
  if (!empty($row['product_image'])) {
      echo '<img src="' . htmlspecialchars($row['product_image']) . '" style="max-width: 100px; max-height: 100px;">';
  } else {
      echo '<img src="/path/to/default-image.png" style="max-width: 100px; max-height: 100px;">'; // Placeholder image if no image is available
  }
  echo "</td>";

  echo "<td>
    <a href='delete_product.php?productId=" . urlencode($row['productId']) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>        </td>";
  echo "</tr>";
}
} else {
    echo "Error fetching products: " . mysqli_error($conn);
}   

// Close database connection
mysqli_close($conn);
?>