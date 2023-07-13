<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Success Page</h2>
        <?php if (session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php echo session('success_message'); ?>
            </div>
        <?php endif; ?>
        <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-primary">Back to Home</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
