<!DOCTYPE html>
<html>
<head>
    <title>Admin Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">SafariStay</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('vendor_dashboard'); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Post">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EditController">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VendorController/history">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VendorController/bookinghistory">Bookings</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="Logout">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
                                <div id="carousel<?= $product['id']; ?>" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
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
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel<?= $product['id']; ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel<?= $product['id']; ?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
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
                            <a href="<?= base_url('vendor/delete_product/' . $product['id']); ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <a href="<?= base_url('vendor_dashboard'); ?>" class="btn btn-primary">Back to Dashboard</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>
