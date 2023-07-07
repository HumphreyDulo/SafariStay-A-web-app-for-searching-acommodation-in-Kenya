<!DOCTYPE html>
<html>

<head>
    <title>Admin Notifications</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<?= $this->extend('admin_layout') ?>
<?= $this->section('content') ?>

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
            <a class="nav-link"  href="/admin_dashboard">Dashboard</a>
          </li>
          <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
            <a class="nav-link" href="/admin_profile">Profile</a>
          </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      <?php else: ?>
        <ul class="navbar-nav mr-auto">  
          <li class="nav-item <?= ($uri->getSegment(1) == 'admin' ? 'active' : null) ?>">
            <a class="nav-link" href="/admin-login">Admin Login</a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
      </div>
  </nav>

    <div class="container">
        <h2>Admin Notifications</h2>
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success">
                <?php echo session('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger">
                <?php echo session('error'); ?>
            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Vendor ID</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notifications as $notification): ?>
                    <tr>
                        <td>
                            <?php echo $notification['vendor_id']; ?>
                        </td>
                        <td>
                            <?php echo $notification['message']; ?>
                        </td>
                        <td>
                            <?php echo $notification['status']; ?>
                        </td>
                        <td>
                            <?php if ($notification['status'] === 'pending'): ?>
                                <form action="<?php echo base_url('admin/accept'); ?>" method="post" style="display: inline;">
                                    <input type="hidden" name="'vendor_id'" value="<?php echo $notification['vendor_id']; ?>">
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                                <form action="<?php echo base_url('admin/deny'); ?>" method="post" style="display: inline;">
                                    <input type="hidden" name="vendor_id" value="<?php echo $notification['vendor_id']; ?>">
                                    <button type="submit" class="btn btn-danger">Deny</button>
                                </form>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      

        <a href="<?php echo base_url('admin_dashboard'); ?>" class="btn btn-primary">Back to Admin Dashboard</a>
    </div>
    <?= $this->endSection() ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>