<!DOCTYPE html>
<html>

<head>
    <title>Advertiser Registration</title>
    <link rel="stylesheet" href="\public\assets\style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }

        .error {
            color: red;
        }

        .password-tooltip {
            position: relative;
            display: block;
            cursor: pointer;
        }

        .password-tooltip .tooltip-content {
            visibility: hidden;
            width: 300px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -100px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .password-tooltip:hover .tooltip-content {
            visibility: visible;
            opacity: 1;
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
      <?php if (session()->get('isLoggedIn')): ?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
            <a class="nav-link"  href="/dashboard">Dashboard</a>
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
      <?php else: ?>
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
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) == 'vendor' ? 'active' : null) ?>">
          <a class="nav-link" href="<?= base_url('VendorController') ?>">Vendor</a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
      </div>
    </nav>
    <div class="container">
        <h2>Vendor Registration</h2>
        <form method="post" style="max-width: 600px;" action="<?php echo base_url('VendorController/register'); ?>">
            <div class="form-group">
                <label for="vendor_id">ID Number:</label>
                <input type="text" id="vendor_id" name="vendor_id" class="form-control" required />
            </div>
            <div class="row col-12">
                <div class="form-group col-md-6">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" class="form-control" required />
                    <?php if (isset($validation)): ?>
                        <small class="text-danger">
                            <?= $validation->getError('firstname') ?>
                        </small>
                    <?php endif; ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" class="form-control" required />
                    <?php if (isset($validation)): ?>
                        <small class="text-danger">
                            <?= $validation->getError('lastname') ?>
                        </small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group col-6">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" value="" required />
                <?php if (isset($validation)): ?>
                    <small class="text-danger">
                        <?= $validation->getError('username') ?>
                    </small>
                <?php endif; ?>
            </div>


            <div class="row col-12">
                <div class="form-group col-md-6">
                    <label for="dob">Date of Birth:</label>
                    <input type="text" name="dob" class="form-control" placeholder="date/month/year" required />
                    <?php if (isset($validation)): ?>
                        <small class="text-danger">
                            <?= $validation->getError('dob') ?>
                        </small>
                    <?php endif; ?>
                </div>

                <div class="form-group col-md-6">
                    <label for="number">Phone number</label>
                    <input type="text" name="number" class="form-control" value="" required />
                    <?php if (isset($validation)): ?>
                        <small class="text-danger">
                            <?= $validation->getError('number') ?>
                        </small>
                    <?php endif; ?>
                </div>
            </div>


            <div class="form-group col-md-6">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" value="" required />
                <?php if (isset($validation)): ?>
                    <small class="text-danger">
                        <?= $validation->getError('email') ?>
                    </small>
                <?php endif; ?>
            </div>

            <div class="row col-12">
                <div class="form-group col-md-6 ">
                    <label for="password">Password:</label>
                    <div class="password-tooltip">
                        <input type="password" name="password" class="form-control" value="" required />
                        <span class="tooltip-content">
                            Password requirements:<br>
                            - Minimum 8 characters<br>
                            - At least 1 uppercase character<br>
                            - At least 1 lowercase character<br>
                            - At least 1 number<br>
                        </span>
                    </div>
                    <?php if (isset($validation)): ?>
                        <small class="text-danger">
                            <?= $validation->getError('password') ?>
                        </small>
                    <?php endif; ?>

                </div>
                <div class="form-group col-md-6">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" class="form-control" value="" required />
                    <?php if (isset($validation)): ?>
                        <small class="text-danger">
                            <?= $validation->getError('confirm_password') ?>
                        </small>
                    <?php endif; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <p><a href="<?php echo base_url('Log'); ?>">Already have an account?</p>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
