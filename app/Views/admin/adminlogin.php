<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form method="post" action="/admin/log">

        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required />
                <?php if (isset($validation)): ?>
                    <small class="text-danger">
                        <?= $validation->getError('username') ?>
                    </small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required />
                <?php if (isset($validation)): ?>
                    <small class="text-danger">
                        <?= $validation->getError('password') ?>
                    </small>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
