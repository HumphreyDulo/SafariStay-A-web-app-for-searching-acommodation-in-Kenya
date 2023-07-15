<!DOCTYPE html>
<html>

<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" href="\assets\css\style.css">
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
        <h2>Admin Registration</h2>
        <?= \Config\Services::validation()->listErrors() ?>
        <form method="post" action="/admin/registerAdmin">

        <div class="form-group col-6">
        <label for="admin_name">Admin name:</label>
        <input type="text" name="admin_name" class="form-control" value="" required />
        <?php if (isset($validation)): ?>
          <small class="text-danger">
            <?= $validation->getError('username') ?>
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
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
