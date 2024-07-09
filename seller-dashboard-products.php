<?php
    session_start();
    if (!isset($_SESSION['sellerId'])) {
        header("Location: seller-login.html");
        exit();
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Products - Tiangge Inc.</title>
    <link rel="icon" type="image/jpeg" sizes="500x500" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background: #ffffff;">
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-light navbar-expand-md py-3" style="font-size: 18px;font-family: Poppins, sans-serif;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span><img height="75px" src="assets/img/Logo%20(1).png"></span>
            </a>
            <h3 style="color: #2d3693;"><strong>Seller Centre</strong></h3>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto"></ul>
                <a class="btn btn-primary" role="button" style="background: #2d3693;margin-left: 5px;margin-right: 5px;border-style: none;" href="seller-login.html">LOG OUT</a>
            </div>
        </div>
    </nav><!-- End: Navbar Centered Links -->

    <section>
        <!-- Start: 2 Rows 1+2 Columns -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Start: Heading Title -->
                    <section>
                        <div class="container">
                            <h3 class="text-center" style="font-family: Poppins, sans-serif;font-size: 40px;font-weight: bold;color: #2d3693;margin-bottom: 15px;margin-top: 15px;">Products Dashboard</h3>
                        </div>
                    </section><!-- End: Heading Title -->
                </div>
            </div>
            <div class="row justify-content-center" style="margin-right: 0;font-family: Poppins, sans-serif;font-size: 41px;">
                <div class="col-md-6 col-xl-3 col-xxl-3" style="width: 275px;margin: 15px;padding: 0px;height: 275px;margin-left: 0px;margin-right: 0px;">
                    <a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 0px;margin-bottom: 5px;font-size: 20px;font-weight: bold;background: rgb(255,255,255);text-align: left;padding-top: 12px;padding-bottom: 12px;color: #2d3693;border: 2px solid #2d3693;" href="seller-dashboard-overview.php"><span style="font-weight: normal !important;">Dashboard</span></a>
                    <button class="btn btn-primary active" type="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: #2d3693;border-width: 2px;border-color: #2d3693;color: #ffffff;padding-top: 12px;padding-bottom: 12px;"><strong>Products</strong></button>
                    <a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: rgb(255,255,255);border-width: 2px;border-color: #2d3693;color: #2d3693;padding-top: 12px;padding-bottom: 12px;" href="seller-dashboard-orders.php">Orders</a>
                    <a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: rgb(255,255,255);border-width: 2px;border-color: #2d3693;color: #2d3693;padding-top: 12px;padding-bottom: 12px;" href="seller-dashboard-account.php">Account</a>
                </div>
                <div class="col-md-6 col-lg-7 col-xl-8 col-xxl-7 d-flex flex-column justify-content-evenly" style="border-radius: 4px;border: 1px solid #2d3693;margin: 10px;padding: 20px;width: 800px;margin-right: 5px;margin-left: 40px;height: Auto;">
                    <div class="d-flex float-start flex-row justify-content-between align-items-xl-start">
                        <button class="btn btn-primary d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="width: 200px;height: 40px;margin-top: 5px;margin-bottom: 5px;font-size: 16px;background: #2d3693;border-width: 2px;border-color: #2d3693;color: #ffffff;padding-top: 12px;padding-bottom: 12px;text-align: center;" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Products</button>
                        <button class="btn btn-primary d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="width: 200px;height: 40px;margin-top: 5px;margin-bottom: 5px;font-size: 16px;background: #2d3693;border-width: 2px;border-color: #2d3693;color: #ffffff;padding-top: 12px;padding-bottom: 12px;text-align: center;" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit Products</button>
                    </div>
                    <div>
                        <h2 class="text-center" style="font-family: Poppins, sans-serif;font-size: 34px;font-weight: bold;color: #2d3693;margin-bottom: 15px;margin-top: 15px;">Product Lists</h2>
                    </div>
                    <div style="font-size: 20px;">
                        <div class="table-responsive" style="font-size: 16px;">
                            <table class="table">
                                <thead style="font-size: 20px;">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Stocks</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="productTableBody">
                                <?php include 'display_products.php'; ?>
                                <!-- Product rows will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End: 2 Rows 1+2 Columns -->
</section>

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" action="add_product.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="productSale" class="form-label">Sale</label>
                            <input type="number" class="form-control" id="productSale" name="productSale" required>
                        </div>
                        <div class="mb-3">
                            <label for="productStocks" class="form-label">Stocks</label>
                            <input type="number" class="form-control" id="productStocks" name="productStocks" required>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="edit_product.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="editProductName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editProductPrice" name="editProductPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductSale" class="form-label">Sale</label>
                        <input type="number" class="form-control" id="editProductSale" name="editProductSale" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductStocks" class="form-label">Stocks</label>
                        <input type="number" class="form-control" id="editProductStocks" name="editProductStocks" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="editProductImage" name="editProductImage" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch products on page load
            $.ajax({
                url: 'display_products.php',
                type: 'GET',
                success: function(response) {
                    $('#productTableBody').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching products:', error);
                }
            });
        });
    </script>
    <!-- <script src="assets/js/script.js"></script> -->
</body>

</html>
