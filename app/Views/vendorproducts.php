<!DOCTYPE html>
<html>
<head>
    <title>Vendor Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .message {
            text-align: center;
            font-size: 20px;
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vendor Products</h2>

        <?php if (isset($message)): ?>
            <div class="message">
                <?= $message ?>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['product_name']; ?></h5>
                        <p class="card-text"><?= $product['product_description']; ?></p>
                        <p class="card-text">Location: <?= $product['location']; ?></p>
                        <p class="card-text">Number of Bedrooms: <?= $product['bedrooms']; ?></p>
                        <p class="card-text">Number of Bathrooms: <?= $product['bathrooms']; ?></p>
                        <p class="card-text">Price per Month: <?= $product['price']; ?></p>
                        <p class="card-text">Available Date: <?= $product['available_date']; ?></p>
                        <p class="card-text">Additional Information: <?= $product['additional_info']; ?></p>

                        <?php
                        $images = explode(',', $product['product_images']);
                        $firstImage = true;
                        foreach ($images as $index => $image) {
                            $imageClass = $firstImage ? 'active' : '';
                            ?>
                            <div class="carousel-item <?= $imageClass; ?>">
                                <img src="<?= base_url('/' . $image); ?>" class="card-img" alt="Product Image">
                            </div>
                            <?php
                            $firstImage = false;
                        }
                        ?>

                        <a href="<?= base_url('vendor/delete_product/' . $product['id']); ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <a href="<?= base_url('vendor_dashboard'); ?>" class="btn btn-primary">Back to Dashboard</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


