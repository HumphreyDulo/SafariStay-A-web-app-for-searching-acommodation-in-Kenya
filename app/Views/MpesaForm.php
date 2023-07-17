<!DOCTYPE html>
<html>

<head>
    <title>M-PESA Payment Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <h2>M-PESA Payment Form</h2>
    <form method="post" action="<?php echo base_url('MpesaController/stkpush'); ?>">
        <div class="form-group">
            <?php if (session()->has('error_message')): ?>
                <div class="alert alert-danger">
                    <?php echo session('error_message'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->has('success_message')): ?>
                <div class="alert alert-success">
                    <?php echo session('success_message'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Pay</button>
        <a href="PayChoice" class="btn btn-primary">Back</a>
    </form>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>