<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>Home | Efficient Farming</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php include('header_link.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        @media (min-width: 1366px) and (max-width: 1649px) {
            .layout-4 .box-content2 .box-left {
                width: 100%;
            }

            .layout-4 .box-content2 .extra-right {
                width: 100%;
            }
        }
    </style>

</head>

<body class="common-home res layout-4">

<?php if ($this->session->flashdata('checkLogin') != '') {
    ?>
    <script>
        swal({
            title: "Login",
            text: "<?= $this->session->flashdata('checkLogin')?>",
            icon: "warning",
            button: "Login",
            closeOnClickOutside: false
        }).then(function () {
            window.location = "<?= base_url('userLogin')?>";
        });
    </script>
    <?php
    exit;
}
?>
<div id="wrapper" class="wrapper-fluid banners-effect-10">
    <?php include('header.php'); ?>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Order History</a></li>
        </ul>
        <?php
        $id = sessionId('userId');
        $getHistory = getRowByIdInOrder('tbl_book_product', 'user_id', $id, 'book_product_id', 'DESC');


        ?>


        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="title">Order History</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td>Sr No.</td>
                            <td class="text-left">Machine Name</td>
                            <td class="text-center">Order ID</td>
                            <td class="text-center">Book Date</td>
                            <td class="text-center">Area</td>
                            <td class="text-center">Amount</td>
                            <td class="text-center">Status</td>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $i = 0;
                        foreach ($getHistory as $h) {
                            $getData = getRowById('tbl_sub_category', 'sub_category_id', $h['machine_id']);
                            ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td class="text-left"><?= $getData[0]['sub_category_name'] ?></td>
                                <td class="text-center"><?= $h['order_id'] ?></td>
                                <td class="text-center"><?= $h['create_date'] ?></td>
                                <td class="text-center"><?= $h['total_area'] ?>sq. ft.</td>
                                <td class="text-center"><?= $h['amount'] ?></td>
                                <td>
                                    <?php
                                    if ($h['status'] == '0') {
                                        ?>
                                        <span class="badge "
                                              style="background-color: #FFC107; color: #000;">pending</span>
                                        <?php
                                    } else if ($h['status'] == '1') {
                                        ?>
                                        <span class="badge "
                                              style="background-color: #007BFF; color: #fff0f0;">Booking Accept</span>
                                        <?php
                                    } else if ($h['status'] == '2') {
                                        ?>
                                        <span class="badge "
                                              style="background-color: #DC3545; color: #ffffff;">Booking Cancel</span>
                                        <?php
                                    } else if ($h['status'] == '3') {
                                        ?>
                                        <span class="badge "
                                              style="background-color: #28A745; color: #ffffff;">On The Way</span>
                                        <?php
                                    } else if ($h['status'] == '4') {
                                        ?>
                                        <span class="badge "
                                              style="background-color: #17A2B8; color: #ffffff;">Work Finish</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        } ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!--Middle Part End-->
            <!--Right Part Start -->
            <aside class="col-sm-3 hidden-xs" id="column-right">
                <h2 class="subtitle">Account</h2>
                <div class="list-group">
                    <ul class="list-item">
                        <li><a href="login.html">Login</a>
                        </li>
                        <li><a href="register.html">Register</a>
                        </li>
                        <li><a href="#">Forgotten Password</a>
                        </li>
                        <li><a href="#">My Account</a>
                        </li>
                        <li><a href="#">Address Books</a>
                        </li>
                        <li><a href="wishlist.html">Wish List</a>
                        </li>
                        <li><a href="#">Order History</a>
                        </li>
                        <li><a href="#">Downloads</a>
                        </li>
                        <li><a href="#">Reward Points</a>
                        </li>
                        <li><a href="#">Returns</a>
                        </li>
                        <li><a href="#">Transactions</a>
                        </li>
                        <li><a href="#">Newsletter</a>
                        </li>
                        <li><a href="#">Recurring payments</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!--Right Part End -->
        </div>
    </div>


</div>
<?php include('footer.php'); ?>

<?php include('footer_link.php'); ?>
</body>

</html>