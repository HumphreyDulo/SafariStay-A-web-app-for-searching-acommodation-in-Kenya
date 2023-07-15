<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-7F/BA5Gfn/3OfYEuZ3P/Z8CSxT0OJ3Rlry0ziL45oJF3//2TFTbKDs5Qhpxs4C5n3gtqoR3JDkM6+GpVvF5V3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title></title>
</head>

<body>
  <?php
  $uri = service('uri');
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <i class="fas fa-globe"></i> SafariStay
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if (session()->get('isLoggedIn')) : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
              <a class="nav-link" href="/dashboard">
                <i class="fas fa-chart-line"></i> Dashboard
              </a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
              <a class="nav-link" href="/profile">
                <i class="fas fa-user"></i> Profile
              </a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'history' ? 'active' : null) ?>">
              <a class="nav-link" href="/booking-history">
                <i class="fas fa-store"></i> History
              </a>
            </li>
          </ul>
          <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/logout">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'login' ? 'active' : null) ?>">
              <a class="nav-link" href="/login">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
              <a class="nav-link" href="/register">
                <i class="fas fa-user-plus"></i> Register
              </a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'admin' ? 'active' : null) ?>">
              <a class="nav-link" href="/admin-login">
                <i class="fas fa-user-shield"></i> Admin
              </a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'vendor' ? 'active' : null) ?>">
              <a class="nav-link" href="<?= base_url('VendorController') ?>">
                <i class="fas fa-store"></i> Vendor
              </a>
            </li>
            
          </ul>

        <?php endif; ?>
      </div>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRPeSQF7xpD6z6Eto3Pp5f5/KFfFV1fbS+N7a/nq9" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
