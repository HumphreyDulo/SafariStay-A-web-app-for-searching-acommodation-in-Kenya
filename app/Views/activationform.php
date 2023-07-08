<head>
    <h2>Account Activation</h2>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php if (isset($error)): ?>
        <p class="error">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>

    <form action="<?php echo base_url('Activate'); ?>" method="post">
        <div class="form-group">
            <label for="activation_code">Activation Code</label>
            <input type="password" id="activation_code" name="activation_code" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Activate Account</button>
    </form>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>