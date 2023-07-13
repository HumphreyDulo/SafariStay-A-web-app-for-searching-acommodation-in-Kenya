<!DOCTYPE html>
<html>
<head>
    <title>Error Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Error Page</h2>
        <?php if (session()->has('error_message')): ?>
            <div class="alert alert-danger">
                <?php echo session('error_message'); ?>
            </div>
        <?php endif; ?>
        <a href="<?php echo base_url('MpesaForm'); ?>" class="btn btn-primary">Back to Payment</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>