<!DOCTYPE html>
<html>
<head>
    <title>M-PESA Payment Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h2>M-PESA Payment Form</h2>
    <form method="post" action="<?php echo base_url('PaymentController/Mprocess'); ?>">
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Pay</button>

        <a href="PayChoice" class="btn btn-primary">Back </a>
    </form>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
