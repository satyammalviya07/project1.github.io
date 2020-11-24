<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>

    <title>Vendor Registration</title>
    <?php include('header_link.php'); ?>

    <link rel="stylesheet" href="<?= base_url('Assets/assets/css/login_page.min.css') ?>"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .row span {
            color: red;
        }
    </style>
</head>
<body style="background-color: #dcdcdc; overflow-x: hidden">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="md-card">
            <form method="post" action="">
                <div class="md-card-content ">
                    <h2 class="heading_a uk-margin-medium-bottom">Create an Account for Vendor</h2>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="register_username">Full Name</label>
                            <input class="md-input name" type="text" name="name" value="<?= set_value('name') ?>">
                            <span id="name"><?= form_error('name') ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="register_email">E-mail *</label>
                            <input class="md-input email" type="email" name="email"
                                   value="<?= set_value('email') ?>">
                            <span id="email"><?= form_error('email') ?></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="register_username">Phone No.</label>
                            <input class="md-input phone" type="text" name="phone"
                                   value="<?= set_value('phone') ?>">
                            <span id="phone"><?= form_error('phone') ?></span>
                        </div>
                        <div class="col-md-6 mt-2">
                           <span class="icheck-inline" style="color: black">
                                <input type="radio" name="gender" value="Male" id="radio_demo_inline_1"
                                       checked data-md-icheck/>
                                <label for="radio_demo_inline_1" class="inline-label">Male</label>
                           </span>
                            <span class="icheck-inline" style="color: black">
                                <input type="radio" name="gender" value="Female" id="radio_demo_inline_2"
                                       data-md-icheck/>
                                <label for="radio_demo_inline_2" class="inline-label">Female</label>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="register_password">Password</label>
                            <input class="md-input password" type="password" value="<?= set_value('password') ?>"/>
                            <span id="password"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="register_password_repeat">Confirm Password</label>
                            <input class="md-input cnf_password" type="password"
                                   value="<?= set_value('password') ?>"
                                   name="password"/>
                            <span style="color: red" id="cnf_password"><?= form_error('password') ?></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="register_password">Shop Name</label>
                            <input class="md-input shop_name" type="text" name="shop_name"
                                   value="<?= set_value('shop_name') ?>"/>
                            <span style="color: red" id="shop_name"><?= form_error('shop_name') ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="register_password">Address</label>
                            <input class="md-input address" type="text" name="address"
                                   value="<?= set_value('address') ?>"/>
                            <span style="color: red" id="address"><?= form_error('address') ?></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="register_password">Area</label>
                            <input class="md-input area" type="text" name="area" value="<?= set_value('area') ?>"/>
                            <span style="color: red" id="area"><?= form_error('area') ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="register_password_repeat">pincode</label>
                            <input class="md-input pincode" type="text"
                                   value="<?= set_value('pincode') ?>"
                                   name="pincode"/>
                            <span style="color: red" id="pincode"><?= form_error('pincode') ?></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <select class="md-input state" onchange="getCity(this.value)" name="state"
                                    title="Select State"
                                    data-uk-tooltip="{pos:'top'}">
                                <option value="">Select State</option>
                                <?php
                                $state = getAllRow('state');
                                foreach ($state as $s) { ?>
                                    <option value="<?= $s['state'] ?>"><?= $s['state'] ?></option>
                                <?php } ?>
                            </select>
                            <span id="state"></span>
                        </div>
                        <div class="col-md-6">
                            <select name="city" class="md-input city">
                                <option value="">Select City</option>
                            </select>
                            <span style="color: red" id="city"><?= form_error('city') ?></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary register">Sign Up
                            </button>
                        </div>
                        <p>Already have an accout?<a href="vendorLogin" class="uk-float-right">Sign in</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
<?php include('footer_link.php'); ?>
<script src="<?= base_url('Assets/assets/js/pages/login.min.js') ?>"></script>

<script>
    function getCity(val) {
        $.ajax({
            type: "POST",
            url: "<?= base_url("getCity")?>",
            data: 'state_id=' + val,
            success: function (data) {
                console.log(data);
                $(".city").html(data);
            }
        });
    }

    $(document).ready(function () {
        $('.cnf_password').keyup(function () {
            var register_password = $('.password').val();
            var register_password_repeat = $('.cnf_password').val();
            if (register_password != register_password_repeat) {
                $('#cnf_password').html('<span>Password not match.</span>');
            } else {
                $('#cnf_password').html('<span></span>');
            }
        });
    });

    $('.register').click(function () {
        var name = $('.name').val();
        var phone = $('.phone').val();
        var password = $('.password').val();
        var cnf_password = $('.cnf_password').val();
        var address = $('.address').val();
        var area = $('.area').val();
        var pincode = $('.pincode').val();
        var state = $('.state').val();
        var city = $('.city').val();
        var shop_name = $('.shop_name').val();

        if (name == '') {
            $('#name').html('<span>Name Field is required</span>');
            return false;
        } else if (phone == '') {
            $('#phone').html('<span>Phone no Field is required</span>');
            return false;
        } else if (password == '') {
            $('#password').html('<span>Password Field is required</span>');
            return false;
        } else if (cnf_password == '') {
            $('#cnf_password').html('<span>confirm Password Field is required</span>');
            return false;
        } else if (password != cnf_password) {
            $('#cnf_password').html('<span>password Does Not match</span>');
            return false;
        } else if (shop_name == '') {
            $('#shop_name').html('<span>This Field is required.</span>');
            return false;
        } else if (address == '') {
            $('#address').html('<span>This Field is required.</span>');
            return false;
        } else if (area == '') {
            $('#area').html('<span>This Field is required.</span>');
            return false;
        } else if (pincode == '') {
            $('#pincode').html('<span>This Field is required.</span>');
            return false;
        } else if (state == '') {
            $('#state').html('<span>This Field is required.</span>');
            return false;
        } else {

        }
    });

</script>
<?php if ($this->session->flashdata('register_success') != '') {
    ?>
    <script>
        swal({
            title: "Registration",
            text: "<?= $this->session->flashdata('register_success')?>",
            icon: "success",
            button: "Login",
            closeOnClickOutside: false
        }).then(function () {
            window.location = "<?= base_url('vendorLogin')?>";
        });
    </script>
    <?php
} ?>

<?php if ($this->session->flashdata('register_error') != '') {
    ?>
    <script>
        swal({
            title: "Registration",
            text: "<?= $this->session->flashdata('register_error')?>",
            icon: "fail",
            button: "Login",
        });
    </script>
    <?php
} ?>
</html>
