<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('Assets/assets/css/login_page.min.css') ?>"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="login_page" style="background-color: #dcdcdc; overflow-x: hidden">
<div class="login_page_wrapper">
    <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
            <div class="login_heading">
                <div class="user_avatar"></div>
                <h4>User Login</h4>
            </div>
            <form method="post" action="">
                <div class="uk-form-row">
                    <label for="login_username">Enter Email / Phone No</label>
                    <input class="md-input" type="text" id="login_username" name="phone"
                           value="<?= set_value('phone') ?>"/>
                    <span><?= form_error('phone'); ?></span>
                </div>
                <div class="uk-form-row">
                    <label for="login_password">Enter Password</label>
                    <input class="md-input" type="password" id="login_password" name="password"
                           value="<?= set_value('password') ?>"/>
                    <span><?= form_error('password'); ?></span>
                </div>
                <div class="uk-margin-medium-top">
                    <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                </div>
            </form>
            <div class="uk-margin-top">
                <p>Don't have an account?
                    <a href="userRegister" class="uk-float-right">Sign up Here</a>
                </p>
            </div>
            <div style="text-align: center">
                <a href="<?= base_url('vendorLogin') ?>">Vendor Login</a>
            </div>
        </div>
    </div>
</div>

</body>
<script src="<?= base_url('Assets/assets/js/common.min.js') ?>"></script>
<script src="<?= base_url('Assets/assets/js/altair_admin_common.min.js') ?>"></script>
<script src="<?= base_url('Assets/assets/js/pages/login.min.js') ?>"></script>
<?php if ($this->session->flashdata('login_error') != '') {
    ?>
    <script>
        swal({
            title: "Login",
            text: "<?= $this->session->flashdata('login_error')?>",
            icon: "warning",
            button: "Cancel",
            // closeOnClickOutside: false
        })
    </script>
    <?php
} ?>
</html>
