<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>


    <title>All Machine</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <?php include('header_link.php'); ?>
    <style>
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
<div id="page_content">
    <div id="page_content_inner">
        <div class="md-card">
            <div class="md-card-content">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                        if ($this->session->flashdata('errors') != '') {
                            ?>
                            <div id="snackbar"><?= $this->session->flashdata('errors') ?></div>
                            <?php
                        }
                        ?>
                        <h3 class="heading_a">All Machine Details</h3>
                    </div>
                    <div class="col-md-2 offset-md-6">
                        <a href="<?= base_url('addMachine') ?>" class="btn btn-primary btn-round"
                           style="float: right"><i class="fa fa-plus"></i>Add Machine
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Machine Name</th>
                                <th>User Name / Phone</th>
                                <th>Address / Area</th>
                                <th>Order id</th>
                                <th>Total Area / Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            $bookHistory = getRowByIdInOrder('tbl_book_product', 'vendor_id', sessionId('vendorId'), 'book_product_id', 'DESC');
                            foreach ($bookHistory as $history) {
                                $getMachine = getRowById('tbl_sub_category', 'sub_category_id', $history['machine_id']);
                                ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $getMachine[0]['sub_category_name'] ?></td>
                                    <td><?= $history['name'] ?><br><?= $history['phone'] ?></td>
                                    <td><?= $history['address'] ?><br><?= $history['area'] ?></td>
                                    <td><?= $history['order_id'] ?></td>
                                    <td><?= $history['total_area'] ?>Sq. ft.<?= $history['amount'] ?>&#8377;</td>
                                    <td><?= $history['description'] ?></td>
                                    <td>
                                        <?php
                                        if ($history['status'] == '0') {
                                            ?>
                                            <a href="<?= base_url('acceptStatus?b=') . $history['book_product_id'] . '&s=1' ?>"
                                               class="btn btn-primary">Accept</a>
                                            <a style="margin-top: 5px"
                                               href="<?= base_url('acceptStatus?b=') . $history['book_product_id'] . '&s=2' ?>"
                                               class="btn btn-info">Cancel</a>
                                            <?php
                                        } else if ($history['status'] == '1') {
                                            ?>
                                            <a style="margin-top: 5px"
                                               href="<?= base_url('acceptStatus?b=') . $history['book_product_id'] . '&s=3' ?>"
                                               class="btn btn-info">On the way</a>
                                            <?php
                                        } else if ($history['status'] == '3') {
                                            ?>
                                            <a style="margin-top: 5px"
                                               href="<?= base_url('acceptStatus?b=') . $history['book_product_id'] . '&s=4' ?>"
                                               class="btn btn-info">Finish</a>
                                            <?php
                                        } else if ($history['status'] == '4') {
                                            ?>
                                            <strong>Booking Complete</strong>
                                            <?php
                                        } else {
                                            ?>
                                            <strong>Booking Cancel</strong>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('footer_link.php'); ?>
</body>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $('#example').DataTable();
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    });


</script>
</html>
