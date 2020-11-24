<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('header_link.php'); ?>
</head>
<body class="authentication-bg authentication-bg-pattern">
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h2>Admin Login</h2>
                        </div>
                        <?php if ($this->session->flashdata('login_error') != '') {
                            ?>
                            <div class="alert alert-danger">
                                <span><?= $this->session->flashdata('login_error'); ?></span>
                            </div>
                            <?php
                        } ?>

                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="text" id="emailaddress" name="phone"
                                       placeholder="Enter your phone / email" value="<?= set_value('phone') ?>">
                                <span><?= form_error('phone') ?></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password"
                                       value="<?= set_value('password') ?>"
                                       placeholder="Enter your password">
                                <span><?= form_error('password') ?></span>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include('footer_link.php'); ?>
</html>
