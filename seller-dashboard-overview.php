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
    <title>Dashboard - Tiangge Inc.</title>
    <link rel="icon" type="image/jpeg" sizes="500x500" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background: #ffffff;">
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-light navbar-expand-md py-3" style="font-size: 18px;font-family: Poppins, sans-serif;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span><img height="75px" src="assets/img/Logo%20(1).png"></span></a>
            <h3 style="color: #2d3693;"><strong>Seller Centre</strong></h3><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto"></ul><a class="btn btn-primary" role="button" style="background: #2d3693;margin-left: 5px;margin-right: 5px;border-style: none;" href="seller-login.html">LOG OUT</a>
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
                            <h3 class="text-center" style="font-family: Poppins, sans-serif;font-size: 40px;font-weight: bold;color: #2d3693;margin-bottom: 15px;margin-top: 15px;">Welcome to Tiangge Seller Centre!</h3>
                        </div>
                    </section><!-- End: Heading Title -->
                </div>
            </div>
            <div class="row justify-content-center" style="margin-right: 0;font-family: Poppins, sans-serif;font-size: 41px;">
                <div class="col-md-6 col-xl-3 col-xxl-3" style="width: 275px;margin: 15px;padding: 0px;height: 275px;margin-left: 0px;margin-right: 0px;"><a class="btn btn-primary active" role="button" style="width: 275px;height: 60px;margin-top: 0px;margin-bottom: 5px;font-size: 20px;font-weight: bold;background: #2d3693;text-align: left;padding-top: 12px;padding-bottom: 12px;color: #ffffff;border: 2px solid #2d3693;" href="seller-dashboard-overview.php">Dashboard</a><a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: #ffffff;border-width: 2px;border-color: #2d3693;color: #2d3693;padding-top: 12px;padding-bottom: 12px;" href="seller-dashboard-products.php">Products</a><a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: rgb(255,255,255);border-width: 2px;border-color: #2d3693;color: #2d3693;padding-top: 12px;padding-bottom: 12px;" href="seller-dashboard-orders.php">Orders</a><a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: rgb(255,255,255);border-width: 2px;border-color: #2d3693;color: #2d3693;padding-top: 12px;padding-bottom: 12px;" href="seller-dashboard-account.php">Account</a></div>
                <div class="col-md-6 col-lg-7 col-xl-8 col-xxl-7 d-flex flex-column justify-content-evenly justify-content-xl-center" style="border-radius: 4px;border: 1px solid #2d3693;margin: 10px;padding: 20px;width: 800px;margin-right: 5px;margin-left: 40px;">
                    <div class="d-flex flex-row justify-content-xl-center align-items-xl-center" style="width: 725px;height: 250px;margin-top: 10px;margin-bottom: 10px;">
                        <div style="width: 225px;height: 225px;font-size: 31px;border: 2px solid #2d3693;border-radius: 5px;margin-bottom: 0px;padding: 20px;color: #2d3693;margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="font-size: 25px;width: 35px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M112 112C112 50.14 162.1 0 224 0C285.9 0 336 50.14 336 112V160H400C426.5 160 448 181.5 448 208V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V208C0 181.5 21.49 160 48 160H112V112zM160 160H288V112C288 76.65 259.3 48 224 48C188.7 48 160 76.65 160 112V160zM136 256C149.3 256 160 245.3 160 232C160 218.7 149.3 208 136 208C122.7 208 112 218.7 112 232C112 245.3 122.7 256 136 256zM312 208C298.7 208 288 218.7 288 232C288 245.3 298.7 256 312 256C325.3 256 336 245.3 336 232C336 218.7 325.3 208 312 208z"></path>
                            </svg>
                            <h6 style="font-size: 20px;"><strong>Products</strong></h6>
                            <p style="font-size: 67px;">0</p>
                        </div>
                        <div style="width: 225px;height: 225px;font-size: 31px;border: 2px solid #2d3693;border-radius: 5px;margin-bottom: 0px;padding: 20px;color: #2d3693;margin-right: 5px;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor" style="font-size: 25px;width: 35px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"></path>
                            </svg>
                            <h6 style="font-size: 20px;"><strong>Orders</strong></h6>
                            <p style="font-size: 67px;">0</p>
                        </div>
                        <div style="width: 225px;height: 225px;font-size: 31px;border: 2px solid #2d3693;border-radius: 5px;margin-bottom: 0px;padding: 20px;color: #2d3693;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="1em" height="1em" fill="currentColor" style="font-size: 25px;width: 35px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M112 0C85.49 0 64 21.49 64 48V96H16C7.163 96 0 103.2 0 112C0 120.8 7.163 128 16 128H272C280.8 128 288 135.2 288 144C288 152.8 280.8 160 272 160H48C39.16 160 32 167.2 32 176C32 184.8 39.16 192 48 192H240C248.8 192 256 199.2 256 208C256 216.8 248.8 224 240 224H16C7.163 224 0 231.2 0 240C0 248.8 7.163 256 16 256H208C216.8 256 224 263.2 224 272C224 280.8 216.8 288 208 288H64V416C64 469 106.1 512 160 512C213 512 256 469 256 416H384C384 469 426.1 512 480 512C533 512 576 469 576 416H608C625.7 416 640 401.7 640 384C640 366.3 625.7 352 608 352V237.3C608 220.3 601.3 204 589.3 192L512 114.7C499.1 102.7 483.7 96 466.7 96H416V48C416 21.49 394.5 0 368 0H112zM544 237.3V256H416V160H466.7L544 237.3zM160 464C133.5 464 112 442.5 112 416C112 389.5 133.5 368 160 368C186.5 368 208 389.5 208 416C208 442.5 186.5 464 160 464zM528 416C528 442.5 506.5 464 480 464C453.5 464 432 442.5 432 416C432 389.5 453.5 368 480 368C506.5 368 528 389.5 528 416z"></path>
                            </svg>
                            <h6 style="font-size: 20px;"><strong>To Ship</strong></h6>
                            <p style="font-size: 67px;">0</p>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <h1 style="color: #2d3693;"><strong>Products Summary</strong></h1><!-- Start: Product Table -->
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

                        </div><!-- End: Product Table --><a class="btn btn-primary" role="button" style="background: #2d3693;" href="seller-dashboard-products.php">See more &gt;</a>
                    </div>

                    <div style="margin-top: 10px;">
                        <h1 style="color: #2d3693;"><strong>Orders Summary</strong></h1><!-- Start: Orders Table -->
                        <div class="table-responsive" style="font-size: 16px;">
                        <table class="table">
                                <thead style="font-size: 20px;">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Buyer Name</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Delivery Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="productTableBody">
                                <?php include 'display_orders.php'; ?>
                                <!-- Product rows will be dynamically added here -->
                            </tbody>
                        </table>

                        </div><!-- End: Orders Table --><a class="btn btn-primary" role="button" style="background: #2d3693;" href="seller-dashboard-orders.php">See more &gt;</a>
                    </div>
                </div>
            </div>
        </div><!-- End: 2 Rows 1+2 Columns -->
    </section>
    <section></section><!-- Start: Footer Dark Multi Column -->
    <footer class="text-white bg-dark" style="font-family: Poppins, sans-serif;">
        <div class="container py-4 py-lg-5" style="padding-right: 24px;padding-left: 24px;">
            <div class="row justify-content-center">
                <!-- Start: Services -->
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 text-white"><strong>Shop</strong></h3>
                    <ul class="list-unstyled">
                        <li><a class="link-light" href="#" style="font-size: 14px;">Explore</a></li>
                        <li style="font-size: 14px;"><a class="link-light" href="#" style="font-size: 14px;">Customer Service</a></li>
                        <li style="font-size: 14px;"><a class="link-light" href="#">Policies</a></li>
                    </ul>
                </div><!-- End: Services -->
                <!-- Start: About -->
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 text-white"><strong>About</strong></h3>
                    <ul class="list-unstyled">
                        <li style="font-size: 14px;"><a class="link-light" href="about.html" style="font-size: 14px;">About Us</a></li>
                        <li style="font-size: 14px;"><a class="link-light" href="#" style="font-size: 14px;">Schedules</a></li>
                        <li style="font-size: 14px;"><a class="link-light" href="#">Meet the Vendors</a></li>
                    </ul>
                </div><!-- End: About -->
                <!-- Start: Careers -->
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 text-white"><strong>Careers</strong></h3>
                    <ul class="list-unstyled">
                        <li><a class="link-light" href="#" style="font-size: 14px;">Job Openings</a></li>
                        <li style="font-size: 14px;"><a class="link-light" href="seller-login.html" style="font-size: 14px;">Work With Us</a></li>
                        <li style="font-size: 14px;"><a class="link-light" href="#" style="font-size: 14px;">How to Apply</a></li>
                    </ul>
                </div><!-- End: Careers -->
                <!-- Start: Social Icons -->
                <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last">
                    <div class="fw-bold d-flex align-items-center mb-2"><a href="index.html"><img width="150px" src="assets/img/Logo%20(2).png"></a></div>
                    <p class="text-muted" style="font-size: 12px;">Discover the heart of Taytay's vibrant tiangge culture online!&nbsp; Shop fashion, gifts, and traditional wear from our talented local</p>
                </div><!-- End: Social Icons -->
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2024 Taytay Tiangge Inc.</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                        </svg></li>
                </ul>
            </div>
        </div>
    </footer><!-- End: Footer Dark Multi Column -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>