<!DOCTYPE html>
<html>
<head>
    <title>Admin Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?= $this->extend('admin_layout') ?>
    <?= $this->section('content') ?>

    <div class="container">
        <h2>View Products</h2>
        <?php if (session()->has('success_message')): ?>
            <div class="alert alert-success">
                <?php echo session('success_message'); ?>
            </div>
        <?php endif; ?>

        <?php foreach ($products as $product): ?>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="<?= base_url('uploads/' . $product['product_images'][0]); ?>" class="card-img" alt="Product Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['product_name']; ?></h5>
                            <p class="card-text"><?= $product['product_description']; ?></p>
                            <p class="card-text">Location: <?= $product['location']; ?></p>
                            <p class="card-text">Number of Bedrooms: <?= $product['bedrooms']; ?></p>
                            <p class="card-text">Number of Bathrooms: <?= $product['bathrooms']; ?></p>
                            <p class="card-text">Price per Month: <?= $product['price']; ?></p>
                            <p class="card-text">Available Date: <?= $product['available_date']; ?></p>
                            <p class="card-text">Additional Information: <?= $product['additional_info']; ?></p>
                            <a href="<?= base_url('admin/delete_product/' . $product['id']); ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <a href="<?= base_url('admin_dashboard'); ?>" class="btn btn-primary">Back to Admin Dashboard</a>
    </div>
    <?= $this->endSection() ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
