<?php
session_start();
require 'db_connect.php'; // Make sure db_connect.php is correctly included

// Fetch seller details if logged in
$sellerId = $_SESSION['sellerId'];
if ($sellerId) {
    $stmt = $conn->prepare("SELECT businessName, email, phoneNumber, facebook, ownerName, ownerEmail, ownerPhoneNumber FROM sellerDetails WHERE sellerId = ?");
    $stmt->bind_param("i", $sellerId);
    $stmt->execute();
    $stmt->bind_result($businessName, $email, $phoneNumber, $facebook, $ownerName, $ownerEmail, $ownerPhoneNumber);
    $stmt->fetch();
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $businessName = $_POST['businessName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $facebook = $_POST['facebook'];
    $ownerName = $_POST['ownerName'];
    $ownerEmail = $_POST['ownerEmail'];
    $ownerPhoneNumber = $_POST['ownerPhoneNumber'];

    $stmt = $conn->prepare("REPLACE INTO sellerDetails (sellerId, businessName, email, phoneNumber, facebook, ownerName, ownerEmail, ownerPhoneNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssss", $sellerId, $businessName, $email, $phoneNumber, $facebook, $ownerName, $ownerEmail, $ownerPhoneNumber);
    $stmt->execute();
    $stmt->close();

    // Redirect to avoid form resubmission
    header("Location: seller-dashboard-account-edit.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Account - Tiangge Inc.</title>
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
                <ul class="navbar-nav mx-auto"></ul><button class="btn btn-primary" type="button" style="background: #2d3693;margin-left: 5px;margin-right: 5px;border-style: none;">LOG OUT</button>
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
                            <h3 class="text-center" style="font-family: Poppins, sans-serif;font-size: 40px;font-weight: bold;color: #2d3693;margin-bottom: 15px;margin-top: 15px;">Account Dashboard</h3>
                        </div>
                    </section><!-- End: Heading Title -->
                </div>
            </div>
            <div class="row justify-content-center" style="margin-right: 0;font-family: Poppins, sans-serif;font-size: 41px;">
                <div class="col-md-6 col-xl-3 col-xxl-3" style="width: 275px;margin: 15px;padding: 0px;height: 275px;margin-left: 0px;margin-right: 0px;">
                    <a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 0px;margin-bottom: 5px;font-size: 20px;font-weight: bold;background: rgb(255,255,255);text-align: left;padding-top: 12px;padding-bottom: 12px;color: #2d3693;border: 2px solid #2d3693;" href="seller-dashboard-overview.html"><span style="font-weight: normal !important;">Dashboard</span></a>
                    <button class="btn btn-primary" type="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: #ffffff;border-width: 2px;border-color: #2d3693;color: #2d3693;padding-top: 12px;padding-bottom: 12px;">Products</button>
                    <a class="btn btn-primary" role="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: rgb(255,255,255);border-width: 2px;border-color: #2d3693;color: #2d3693;padding-top: 12px;padding-bottom: 12px;" href="seller-dashboard-orders.html">Orders</a>
                    <a class="btn btn-primary active" role="button" style="width: 275px;height: 60px;margin-top: 5px;margin-bottom: 5px;font-size: 20px;text-align: left;background: #2d3693;border-width: 2px;border-color: #2d3693;color: #ffffff;padding-top: 12px;padding-bottom: 12px;" href="seller-dashboard-account.html"><strong>Account</strong></a>
                </div>
                <div class="col-md-6 col-lg-7 col-xl-8 col-xxl-7 d-flex flex-column justify-content-evenly" style="border-radius: 4px;border: 1px solid #2d3693;margin: 10px;padding: 20px;width: 800px;margin-right: 5px;margin-left: 40px;height: Auto;">
                    <form method="post" action="seller-dashboard-account-edit.php">
                        <div class="d-flex float-start flex-row justify-content-end align-items-xl-start">
                            <button class="btn btn-primary d-xl-flex justify-content-xl-center align-items-xl-center" type="submit" style="width: 200px;height: 40px;margin-top: 5px;margin-bottom: 5px;font-size: 16px;background: #2d3693;border-width: 2px;border-color: #2d3693;color: #ffffff;padding-top: 12px;padding-bottom: 12px;text-align: center;">Save</button>
                        </div>
                        <div style="padding: 10px;">
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 30px;margin-bottom: 0px;margin-right: 10px;color: #2d3693;"><strong>Business Details</strong></p>
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 18px;margin-bottom: 0px;margin-right: 10px;"><strong>Business Name:</strong></p>
                                <input type="text" name="businessName" value="<?php echo htmlspecialchars($businessName); ?>" style="height: 30px;width: 515px;font-size: 16px;border-width: 1px;padding-left: 5px;">
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 18px;margin-bottom: 0px;margin-right: 10px;"><strong>E-mail:</strong></p>
                                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" style="height: 30px;width: 595px;font-size: 16px;border-width: 1px;padding-left: 5px;">
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 18px;margin-bottom: 0px;margin-right: 10px;"><strong>Phone Number:</strong></p>
                                <input type="text" name="phoneNumber" value="<?php echo htmlspecialchars($phoneNumber); ?>" style="height: 30px;width: 515px;font-size: 16px;border-width: 1px;padding-left: 5px;">
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 18px;margin-bottom: 0px;margin-right: 10px;"><strong>Facebook:</strong></p>
                                <input type="text" name="facebook" value="<?php echo htmlspecialchars($facebook); ?>" style="height: 30px;width: 605px;font-size: 16px;border-width: 1px;padding-left: 5px;">
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 30px;margin-bottom: 0px;margin-right: 10px;color: #2d3693;"><strong>Owner Details</strong></p>
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 18px;margin-bottom: 0px;margin-right: 10px;"><strong>Full Name:</strong></p>
                                <input type="text" name="ownerName" value="<?php echo htmlspecialchars($ownerName); ?>" style="height: 30px;width: 570px;font-size: 16px;border-width: 1px;padding-left: 5px;">
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 18px;margin-bottom: 0px;margin-right: 10px;"><strong>E-mail:</strong></p>
                                <input type="text" name="ownerEmail" value="<?php echo htmlspecialchars($ownerEmail); ?>" style="height: 30px;width: 595px;font-size: 16px;border-width: 1px;padding-left: 5px;">
                            </div>
                            <div class="d-flex flex-row" style="width: auto;margin-bottom: 10px;">
                                <p style="font-size: 18px;margin-bottom: 0px;margin-right: 10px;"><strong>Phone Number:</strong></p>
                                <input type="text" name="ownerPhoneNumber" value="<?php echo htmlspecialchars($ownerPhoneNumber); ?>" style="height: 30px;width: 515px;font-size: 16px;border-width: 1px;padding-left: 5px;">
                            </div>
                        </div>
                    </form>
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