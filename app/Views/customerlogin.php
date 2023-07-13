<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .error {
            color: red;
        }

        div.button {
            margin-top: 20px;
        }

        div.buttons {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>

        <div>
    <?php if (isset($login_error)): ?>
        <div class="alert alert-danger">
            <?= $login_error ?>
        </div>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <?php foreach ($validation->getErrors() as $error): ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (isset($activation_error)): ?>
        <div class="alert alert-danger">
            <?= $activation_error ?>
        </div>
    <?php endif; ?>
</div>


        <form method="post" action="<?php echo base_url('Log'); ?>">
            <div class="form-group col-md-6">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" value="" required />
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" value="" required />
            </div>

            <div class="button">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="button">
                <p><a href="<?php echo base_url('/register'); ?>">Don't have an account?</a></p>
            </div>

            <div class="buttons">
                <a href="/forgot-password" class="btn btn-primary">Forgot Password?</a>
            </div>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>