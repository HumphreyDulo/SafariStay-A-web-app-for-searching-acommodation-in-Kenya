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
    <div class="container">
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

