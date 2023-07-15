<!DOCTYPE html>
<html>
<head>
    <title>Specific Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .booking-panel {
            position: sticky;
            top: 20px;
            height: fit-content;
        }
    </style>
</head>
<body>
<?= $this->include('templates/header') ?>
<?= $this->include('templates/footer') ?>


<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-9">
            <h1><?= $product['product_name']; ?></h1>

            <div id="carousel<?= $product['id']; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <?php
                        $images = explode(',', $product['product_images']);
                        $firstImage = true;
                        foreach ($images as $index => $image) {
                            $imageClass = $firstImage ? 'active' : '';
                            ?>
                            <div class="carousel-item <?= $imageClass; ?>">
                                <img src="<?= base_url('/' . $image); ?>" class="d-block w-800 h-800" alt="Product Image" style="height: 600px;">
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

            <div class="row mt-4">
                <div class="col-md-12">
                    <p class="card-text"><?= $product['product_description']; ?></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <p class="card-text">Location: <?= $product['location']; ?></p>
                    <p class="card-text">Bedrooms: <?= $product['bedrooms']; ?></p>
                    <p class="card-text">Bathrooms: <?= $product['bathrooms']; ?></p>

                </div>
                <div class="col-md-6">
                    <p class="card-text">Price: <?= $product['price']; ?></p>
                    <p class="card-text">Available from: <?= $product['available_date']; ?></p>
                    <p class="card-text">Additional Information: <?= $product['additional_info']; ?></p>
                </div>
            </div>


        </div>
        <div class="col-md-3">
            <div class="booking-panel card">
                <div class="card-header">
                    Booking Details
                </div>
                <?php if (session()->has('success_message')): ?>
                     <div class="alert alert-success">
                    <?php echo session('success_message'); ?>
                            </div>
                        <?php endif; ?>
                <div class="card-body">
                <form action="<?= site_url('product/booking/' . $product['id']); ?>" method="post">

                <input type="hidden" name="productId" value="<?= $product['id']; ?>">
                <input type="hidden" name="vendorId" value="<?= $product['vendorid']; ?>">


                <div class="form-group">
                    <label for="checkInDate">Check-in Date</label>
                    <input type="date" id="checkInDate" name="checkInDate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="checkOutDate">Check-out Date</label>
                    <input type="date" id="checkOutDate" name="checkOutDate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="numberOfDays">Number of Days</label>
                    <input type="text" id="numberOfDays" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="totalPrice">Total Price</label>
                    <input type="text" id="totalPrice" name="totalPrice" class="form-control" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Book now</button> <!-- Change the button type to submit -->
            </form>
        </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#checkOutDate').change(function() {
            // Calculate the number of days
            var checkInDate = new Date($('#checkInDate').val());
            var checkOutDate = new Date($(this).val());
            var timeDiff = checkOutDate.getTime() - checkInDate.getTime();
            var numberOfDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            // Calculate the total price
            var pricePerDay = parseFloat('<?= $product['price']; ?>');
            var totalPrice = numberOfDays * pricePerDay;

            // Update the number of days and total price fields
            $('#numberOfDays').val(numberOfDays);
            $('#totalPrice').val(totalPrice);
        });

        $('#bookNowBtn').click(function() {
            // Perform the booking process
            // ...
        });
    });
</script>
</body>
</html>
