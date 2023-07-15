<!DOCTYPE html>
<html>
<head>
    <title>Booking History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<?= $this->include('templates/header') ?>
    <div class="container">
        <h1>Booking History</h1>

        <?php if (!empty($bookings)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
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

    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script> <!-- Replace with your Font Awesome kit link -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add other JS files if needed -->
</body>
</html>
