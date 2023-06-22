<!DOCTYPE html>
<html>

<head>
  <title>User Registration</title>
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
  <div class="container">
    <h2>User Registration</h2>
    <form method="post" action="<?php echo base_url('Auth'); ?>">

      <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('firstname') ?>
          </small>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('lastname') ?>
          </small>
        <?php endif; ?>
      </div>

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
        <label for="dob">Date of Birth</label>
        <input type="text" name="dob" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('dob') ?>
          </small>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="number">Phone number</label>
        <input type="text" name="number" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('number') ?>
          </small>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('email') ?>
          </small>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
              <div class="password-tooltip">
                  <input type="password" name="password" class="form-control" required />
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
      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" class="form-control" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('confirm_password') ?>
          </small>
        <?php endif; ?>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
      <p>Already have an account? <a href="<?php echo base_url('/login'); ?>">Login</p>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>