<?php include_once("includes/admin_header.php"); ?>

<body id="page-top">

  <?php include_once("includes/admin_top_navigation.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once("includes/admin_sidebar_nav.php"); ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Notifications here -->
            <?php
            if (isset($_SESSION['error_message'])) {
              echo "<div class='alert alert-danger mt-2' role='alert'>{$_SESSION['error_message']}</div>";
              unset($_SESSION['error_message']);
            } elseif (isset($_SESSION['success_message'])) {
              echo "<div class='alert alert-success mt-2' role='alert'>{$_SESSION['success_message']}</div>";
              unset($_SESSION['success_message']);
            }
            ?>

          </div>

          <div class="col-md-12">
            <h3 class="page-header">User Account Information</h1>
              <section style="background-color: #eee;">
                <div class="container py-2">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">
                                <?php
                                $full_name = $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
                                echo $full_name;
                                ?>
                              </p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">
                                <?php
                                echo $_SESSION['user_email'];
                                ?>
                              </p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">
                                <?php
                                echo $_SESSION['user_phone'];
                                ?>
                              </p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Meter Number</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">
                                <?php
                                echo $_SESSION['meter_number'];
                                ?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                              <p class="mb-4">Token Balance</p>

                              <p class="mt-4 mb-1" style="font-size: 3rem;">
                                <?php
                                echo $_SESSION['token_balance'];
                                ?>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                              <p class="mb-4">Last Topup</p>

                              <p class="mt-4 mb-1" style="font-size: 3rem;">
                                <?php
                                echo $_SESSION['lately_bought'];
                                ?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card mb-4">
                        <div class="card-body text-center">
                          <h5 class="my-3">Refill KPLC Tokens</h5>
                          <div class="d-flex justify-content-center mb-2">
                            <a href="buy_tokens.php"><button type="button" class="btn btn-primary">Buy Now!</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

          </div>

          <?php include_once("includes/admin_footer.php"); ?>