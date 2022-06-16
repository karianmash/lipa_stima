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
                        <?php
                        if (isset($_POST['buy_tokens'])) {
                            $user_email = $_POST['user_email'];
                            $amount = $_POST['amount'];

                            $new_tokens = round(($amount / 16), 2);
                            $new_balance = $_SESSION['token_balance'] + $new_tokens;

                            $sql = "UPDATE users SET lately_bought = '{$new_tokens}', token_balance = '{$new_balance}' WHERE user_id = '{$_SESSION['user_id']}'";

                            $query = mysqli_query($conn, $sql);

                            if ($query === TRUE) {
                                $sql = "SELECT token_balance, lately_bought FROM users WHERE user_id = '{$_SESSION['user_id']}'";

                                $results = mysqli_query($conn, $sql);

                                // $query = 1 means that one user with the
                                // entered username exists
                                if (
                                    mysqli_num_rows($results) == 1
                                ) {
                                    $data = mysqli_fetch_assoc($results);

                                    $_SESSION['token_balance'] = $data['token_balance'];
                                    $_SESSION['lately_bought'] = $data['lately_bought'];
                                }

                                $conn->close();
                            } else {
                                echo "Error updating record: " . $query->error;
                            }
                            $conn->close();
                            redirect("index.php");
                        }
                        ?>

                    </div>

                    <div class="col-md-12">
                        <h3 class="page-header">Buy Some More KPLC Tokens</h1>
                            <section style="background-color: #eee;">
                                <div style="background-color: #fff;" class="py-2">
                                    <form action="" method="post">
                                        <div class=" form-group">

                                            <label for="NameDemo">Meter Number:</label>

                                            <input type="text" class="form-control" id="NameDemo" aria-describedby="nameHelp" placeholder="<?php echo $_SESSION['meter_number']; ?>" readonly required="required" name="meter_number">
                                        </div>

                                        <div class="form-group">

                                            <label for="EmailDemo">M-pesa Phone Number:</label>

                                            <input type="text" class="form-control" id="EmailDemo" aria-describedby="emailHelp" placeholder="<?php echo $_SESSION['user_phone']; ?>" readonly required="required" name="user_phone">
                                        </div>

                                        <div class="form-group">

                                            <label for="passDemo">Enter Amount:</label>

                                            <input type="number" class="form-control" id="passDemo" aria-describedby="passHelp" placeholder="Amount you want to pay" required="required" name="amount">
                                        </div>
                                        <button type="submit" class="btn btn-success" name="buy_tokens">Buy Now</button>

                                    </form>
                                </div>
                            </section>

                    </div>
                </div>

                <?php include_once("includes/admin_footer.php"); ?>