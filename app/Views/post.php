<!DOCTYPE html>
<html>
<head>
    <title>Add Package</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 50px;
        }
        .form-group label {
            font-weight: bold;
        }
        textarea {
            height: 120px;
        }
        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <a class="navbar-brand" href="/">SafariStay</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('vendor_dashboard') ?>">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="Post">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EditController">Edit Profile</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="Logout">Log Out</a>
                        </li>
                    </ul>
                </div>
        
        </nav>

    <div class="container">
    <?php if (session()->has('success_message')): ?>
        <div class="alert alert-success">
            <?php echo session('success_message'); ?>
        </div>
    <?php endif; ?>
        <h2>Add Package</h2>
        <form method="post" action="<?php echo base_url('Post/add_product'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product_description">Description:</label>
                <textarea name="product_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="product_images">Upload Pictures:</label>
                <input type="file" name="product_images[]" multiple required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bedrooms">Number of Bedrooms:</label>
                <input type="text" name="bedrooms" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bathrooms">Number of Bathrooms:</label>
                <input type="text" name="bathrooms" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price per Month:</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="available_date">Available Date:</label>
                <input type="date" name="available_date" class="form-control" placeholder="D-M-Y" required>
            </div>
            <div class="form-group">
                <label for="additional_info">Additional Information:</label>
                <textarea name="additional_info" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>