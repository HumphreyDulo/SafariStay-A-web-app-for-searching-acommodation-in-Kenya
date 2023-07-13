<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .sidebar-item {
            margin-bottom: 20px;
        }
        .filter-item h3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
        $uri = service('uri');
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">SafariStay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if (session()->get('isLoggedIn')) : ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="/profile">Profile</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1) == 'login' ? 'active' : null) ?>">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
                            <a class="nav-link" href="/">Register</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'admin' ? 'active' : null) ?>">
                            <a class="nav-link" href="/admin-login">Admin</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'vendor' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url('VendorController') ?>">Vendor</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4 mr-0 ml-0">
        <h1>Welcome, <?= session()->get('username') ?>!</h1>

        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar content goes here -->
                <?php include('templates/filters.php'); ?>
            </div>
            <div class="col-md-9">
                <h2>Products:</h2>
                <div class="row">
                <?php $filtered = isset($filtered) && $filtered === true; ?>

                    <?php foreach ($products as $product): ?>
                        <?php if (!$filtered || ($filtered && $product['filtered'])): ?>

                        <div class="col-md-6 product-card">
                            <div class="card mb-3">
                                <div id="carousel<?= $product['id']; ?>" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        $images = explode(',', $product['product_images']);
                                        $firstImage = true;
                                        foreach ($images as $index => $image) {
                                            $imageClass = $firstImage ? 'active' : '';
                                            ?>
                                            <div class="carousel-item <?= $imageClass; ?>">
                                                <img src="<?= base_url('/' . $image); ?>" class="d-block w-100" alt="Product Image" style="max-height: 300px;">
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
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product['product_name']; ?></h5>
                                    <p class="card-text"><?= $product['product_description']; ?></p>
                                    <p class="card-location">Location: <?= $product['location']; ?></p>
                                    <p class="card-bedrooms">Bedrooms: <?= $product['bedrooms']; ?></p>
                                    <p class="card-bathrooms">Bathrooms: <?= $product['bathrooms']; ?></p>
                                    <p class="card-price">Price: <?= $product['price']; ?></p>
                                    <p class="card-text">Available from: <?= $product['available_date']; ?></p>
                                    <p class="card-text">Additional Information: <?= $product['additional_info']; ?></p>
                                    <a href="<?= base_url('product/' . $product['id']); ?>" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
