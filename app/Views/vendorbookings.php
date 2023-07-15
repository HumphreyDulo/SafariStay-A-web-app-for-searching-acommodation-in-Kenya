<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add other CSS files if needed -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">SafariStay</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('vendor_dashboard'); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Post">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EditController">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VendorController/history">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VendorController/bookinghistory">Bookings</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
        <h1>Bookings</h1>

        <?php if (!empty($bookings)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>User ID</th>
                        <th>Product ID</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Total Price</th>
                        <!-- Add other columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?= $booking['booking_id']; ?></td>
                            <td><?= $booking['user_id']; ?></td>
                            <td><?= $booking['product_id']; ?></td>
                            <td><?= $booking['checkin_date']; ?></td>
                            <td><?= $booking['checkout_date']; ?></td>
                            <td><?= $booking['total_price']; ?></td>
                            <!-- Add other columns if needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No bookings found.</p>
        <?php endif; ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add other JS files if needed -->
</body>
</html>
