<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-tap-highlight" content="no"/>
    <title>Student Details</title>
    <?php include('header_link.php'); ?>
    <style>
        input:not([type]).md-input.md-input-success, input[type=color].md-input.md-input-success, input[type=date].md-input.md-input-success, input[type=datetime-local].md-input.md-input-success, input[type=datetime].md-input.md-input-success, input[type=email].md-input.md-input-success, input[type=month].md-input.md-input-success, input[type=number].md-input.md-input-success, input[type=password].md-input.md-input-success, input[type=search].md-input.md-input-success, input[type=tel].md-input.md-input-success, input[type=text].md-input.md-input-success, input[type=time].md-input.md-input-success, input[type=url].md-input.md-input-success, input[type=week].md-input.md-input-success, select.md-input.md-input-success, textarea.md-input.md-input-success {
            border-color: #2C3192;
        }

        .uk-grid span {
            color: red;
        }

        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe" style="background-color: #ECECEC">
<?= include('header.php'); ?>
<?= include('nav_bar.php'); ?>
<?php
if ($this->session->flashdata('errors') != '') {
    ?>
    <div id="snackbar"><?= $this->session->flashdata('errors') ?></div>
    <?php
}
?>
<div id="page_content">
    <div id="page_content_inner">
        <form method="post" action="">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Add Student
                        <button class="md-btn md-btn-primary md-btn-wave-light edit"
                                style="float: right; margin-right: 30px" type="button">Edit
                        </button>
                    </h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label>Enter Name</label>
                                <input type="text" class="md-input md-input-success name" name="name" disabled
                                       value="<?= $name ?>">
                            </div>
                            <span id="name"><?= form_error('name') ?></span>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label>Enter Email</label>
                                <input type="email" class="md-input md-input-success" name="email" disabled
                                       value="<?= $email ?>">
                            </div>
                            <span id="email"><?= form_error('email') ?></span>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label>Enter Phone No</label>
                                <input type="text" class="md-input md-input-success phone" name="phone" disabled
                                       value="<?= $phone ?>">
                            </div>
                            <span id="phone"><?= form_error('phone') ?></span>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row " style="margin-top: 15px">
                                <p class="icheck-inline">
                                    <input type="radio" name="gender" id="radio_demo_inline_1" value="Male"
                                           <?php if ($gender == 'Male'){ ?>checked <?php } ?>
                                           data-md-icheck/>
                                    <label for="radio_demo_inline_1" class="inline-label">Male</label>
                                </p>
                                <p class="icheck-inline">
                                    <input type="radio" name="gender" id="radio_demo_inline_2" value="Female"
                                           <?php if ($gender == 'Female'){ ?>checked <?php } ?>
                                           data-md-icheck/>
                                    <label for="radio_demo_inline_2" class="inline-label">Female</label>
                                </p>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>Shop Name</label>
                                <input type="text" class="md-input md-input-success shop_name" name="shop_name" disabled
                                       value="<?= str_replace("/", "'", $shop_name) ?>">
                            </div>
                            <span id="shop_name"></span>
                        </div>

                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>Enter Addess</label>
                                <input type="text" class="md-input md-input-success address" name="address" disabled
                                       value="<?= str_replace("/", "'", $address) ?>">
                            </div>
                            <span id="address"></span>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label>Enter Area</label>
                                <input type="text" class="md-input md-input-success area" name="area" disabled
                                       value="<?= $area ?>">
                            </div>
                            <span id="area"></span>
                        </div>
                        <div class="uk-width-medium-1-6">
                            <div class="uk-form-row">
                                <label>Enter PinCode</label>
                                <input type="text" class="md-input md-input-success pincode" name="pincode" disabled
                                       value="<?= $pincode ?>">
                            </div>
                            <span id="pincode"></span>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label for="register_password_repeat">State</label>
                                <div class="uk-width-medium-1-12">
                                    <select class="md-input state " disabled
                                            onchange="getCity(this.value)"
                                            data-uk-tooltip="{pos:'top'}" title="Select State" name="state">
                                        <?php
                                        if ($state == '') {
                                            ?>
                                            <option value="">Select State</option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?= $state ?>"><?= $state ?></option>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $state = getAllRow('state');
                                        foreach ($state as $s) { ?>
                                            <option<?php if ($state == $s['state']) {
                                                echo "selected";
                                            } ?>
                                                    value="<?= $s['state'] ?>"><?= $s['state'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <span id="state"></span>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label for="register_password_repeat">City</label>
                                <div class="uk-width-medium-1-12">
                                    <select class="md-input city" disabled
                                            data-uk-tooltip="{pos:'top'}" title="Select City" name="city" id="city">
                                        <?php
                                        if ($city == '') {
                                            ?>
                                            <option value="">Select City</option>
                                            <?php
                                        } else {
                                            $allCity = getAllRow('cities');
                                            foreach ($allCity as $all) {
                                                ?>
                                                <option value="<?= $all['city_name'] ?>"
                                                    <?php
                                                    if ($city == $all['city_name']) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                ><?= $all['city_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <span id="citys"></span>
                        </div>
                    </div>
                    <div class="row btnShow" style="margin-top: 20px; margin-bottom: 10px; text-align: center">
                        <div class="uk-width-medium-1-1">
                            <button type="submit" class="md-btn md-btn-primary md-btn-wave-light save">Save</button>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>


<?php include('footer_link.php'); ?>
<script>
    function getCity(val) {
        $.ajax({
            type: "POST",
            url: "<?= base_url("getCity")?>",
            data: 'state_id=' + val,
            success: function (data) {
                $("#city").html(data);
            }
        });
    }



    $(document).ready(function () {

        $(document).ready(function () {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 3000);
        });


        $('.btnShow').hide();
        $('.save').click(function () {
            let name = $('.name').val();
            let phone = $('.phone').val();
            let password = $('.password').val();
            let cnfPassword = $('.cnfPassword').val();
            let address = $('.address').val();
            let area = $('.area').val();
            let pincode = $('.pincode').val();
            let state = $('.state').val();
            let city = $('.city').val();
            let dob = $('.dob').val();
            let course_name = $('.course_name').val();
            let course_price = $('.course_price').val();


            if (name == '') {
                $('#name').html('<span>Name Field is required</span>');
                return false;
            } else if (phone == '') {
                $('#phone').html('<span>Phone no Field is required</span>');
                return false;
            } else if (password == '') {
                $('#password').html('<span>Password Field is required</span>');
                return false;
            } else if (cnfPassword == '') {
                $('#cnfPassword').html('<span>confirm Password Field is required</span>');
                return false;
            } else if (password != cnfPassword) {
                $('#cnfPassword').html('<span>password Does Not match</span>');
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
            }else {

            }
        });
    });

    $('.edit').click(function () {
        $('.dob').removeAttr('disabled');
        $('.address').removeAttr('disabled');
        $('.area').removeAttr('disabled');
        $('.pincode').removeAttr('disabled');
        $('.state').removeAttr('disabled');
        $('.city').removeAttr('disabled');
        $('.shop_name').removeAttr('disabled');
        $('.btnShow').show();

    });

</script>
</body>
</html>
