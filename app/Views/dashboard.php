<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <li class="nav-item <?= ($uri->getSegment(1) == 'vendor' ? 'active' : null) ?>">
          <a class="nav-link" href="<?= base_url('VendorController') ?>">Vendor</a>
          </li>

        </ul>
        <?php endif; ?>
      </div>
      </div>
    </nav>

    <h1>Welcome to the Dashboard</h1>
    <p>Hello, <?= session()->get('username') ?>!</p>

    <a href = "Logout" class="btn btn-primary">Log out</a>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>