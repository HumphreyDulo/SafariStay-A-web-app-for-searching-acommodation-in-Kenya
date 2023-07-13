
<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Payment Page</h2>
        <form method="post" action="<?php echo base_url('PaymentController/process'); ?>">
            <!-- Payment input fields -->
            <div class="form-group">
                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exp_month">Expiration Month:</label>
                <input type="text" name="exp_month" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exp_year">Expiration Year:</label>
                <input type="text" name="exp_year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" name="cvv" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Pay</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
