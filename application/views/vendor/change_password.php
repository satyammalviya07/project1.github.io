<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <title>Change Password</title>
    <?php include('header_link.php'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        label {
            font-weight: 400;
        }

        .row span {
            color: red;
        }
    </style>
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe" style="background-color: #ECECEC">
<?= include('header.php'); ?>
<?= include('nav_bar.php'); ?>
<div id="page_content">
    <div id="page_content_inner">
        <div class="col-md-offset-2 col-md-6">
            <div class="md-card">
                <form method="post" action="">
                    <div class="md-card-content">
                        <h3 class="heading_a">Change Password</h3>
                        <hr>
                        <?php
                        if ($this->session->flashdata('errors') != '') {
                            ?>
                            <div class="alert <?= $this->session->flashdata('class'); ?>">
                                <?= $this->session->flashdata('errors'); ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <div class="uk-form-row">
                                    <label>Old Password</label>
                                    <input type="password" class="md-input md-input-success old_password"
                                           name="old_password">
                                    <span id="old_password"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-offset-1 col-md-10">
                                <div class="uk-form-row">
                                    <label>New Password</label>
                                    <input type="password" class="md-input md-input-success new_password"
                                           name="new_password">
                                    <span id="new_password"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-offset-1 col-md-10">
                                <div class="uk-form-row">
                                    <label>Confirm Password</label>
                                    <input type="password" class="md-input md-input-success cof_password"
                                           name="cof_password">
                                    <span id="cof_password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: 10px;">
                        <button class="btn btn-danger save">Save</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('footer_link.php'); ?>
</body>

<script>

    $('.save').click(function () {
        let new_password = $('.new_password').val();
        let old_password = $('.old_password').val();
        let cof_password = $('.cof_password').val();

        if (old_password == '') {
            $('#old_password').text('This field is required');
            return false;
        } else if (new_password == '') {
            $('#new_password').html('This field is required');
            return false;
        } else if (cof_password == '') {
            $('#cof_password').text('This field is required');
            return false;
        } else if (new_password != cof_password) {
            $('#cof_password').text('Password Not Match');
            return false;
        } else {

        }
    });

</script>
</html>
