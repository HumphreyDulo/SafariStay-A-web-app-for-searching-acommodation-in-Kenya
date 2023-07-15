<!DOCTYPE html>
<html>
<head>
    <title>All Bookings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add other CSS files if needed -->
</head>
<body>
    <?= $this->extend('admin_layout') ?>
    <?= $this->section('content') ?>
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
    <?= $this->endSection() ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add other JS files if needed -->
</body>
</html>
