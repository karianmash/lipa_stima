<body style="background-color: #02262B;">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="font-family: 'Dancing Script', cursive; font-size: 35px">Lipa Stima</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <?php if (!(isset($_SESSION['user_id'])) || empty($_SESSION['user_first_name'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Sign Up</a>
            </li>
          <?php elseif (!empty($_SESSION['user_id'])) : ?>
            <li class="nav-item">
              <a href="#" class="btn btn-danger text-white ml-3" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>