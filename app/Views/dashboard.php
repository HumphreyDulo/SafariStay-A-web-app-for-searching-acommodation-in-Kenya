<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>Hello, <?= session()->get('username') ?>!</p>

    <a href = "Logout" class="btn btn-primary">Log out</a>

    <a href = "<?php echo base_url('VendorController'); ?>" class="btn btn-primary">Vendor Application</a>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>