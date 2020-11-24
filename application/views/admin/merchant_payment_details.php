<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <?php include('header_link.php'); ?>

</head>

<body class="boxed-layout">
<?php include('header.php'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="page-title-box">
                    <?php
                    $shop_name = $this->input->get('shop_name');
                    $merchant_id = $this->input->get('merchant_id');
                    ?>
                    <h3 style="text-align: center">Payment Details : <?= ucwords($shop_name) ?></h3>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card-box">
                    <form role="form" class="parsley-examples" method="post"
                          action="<?= "merchantPay?merchant_id=$merchant_id&shop_name=$shop_name" ?>">
                        <?php
                        $i = 0;
                        $total_amount = 0;
                        foreach ($details as $data) {
                            $i = $i + 1;
                            $order_id = $data['order_id'];
                            $merchant_id = $data['merchant_id'];
                            foreach (getDataById('tbl_book_item', 'product_order_id', $order_id) as $items) {
                                $total_amount = $total_amount + $items['booking_price'];
                            }
                        } ?>
                        <div class="row">
                            <div class="col-md-9">
                                <h3>Total Complete Orders : <?= $i ?></h3>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-blue waves-effect waves-light" data-toggle="modal"
                                        data-target="#full-width-modal">Payment History
                                </button>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Total Amount : <?= $total_amount ?>&#8377;</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                $payment = getDataByIdInOrder('tbl_payment_details', 'user_id', "$merchant_id", 'user_id', "DESC");
                                $t = 0;
                                if ($payment == null) {
                                    ?>
                                    <h3>Total Pay Amount : 0 &#8377;</h3>
                                    <?php
                                } else {

                                    foreach ($payment as $pay) {
                                        $t = $t + $pay['pay_amount'];
                                    }
                                    ?>
                                    <h3>Total Pay Amount : <?= $t ?> &#8377;</h3>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Remaining Amount : <?= (float)$total_amount - (float)$t; ?>&#8377;</h3>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <h4>Pay Amount</h4>
                            <div class="col-md-4">
                                <input data-parsley-type="number" type="text"
                                       class="form-control" required name="amount"
                                       placeholder="Enter amount"/>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success ml-5">Pay</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">

            <h3 class="text-center" style="text-align: center; margin-top: 10px">Pay Amount History</h3>

            <div class="modal-body">
                <div class="row ">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-9 text-sm-center form-inline">
                                        <div class="form-group mr-2">
                                            <select id="demo-foo-filter-status"
                                                    class="custom-select custom-select-sm">
                                                <option value="">Show all</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input id="demo-foo-search" type="text" placeholder="Search"
                                                   class="form-control form-control-sm" autocomplete="on">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive ">
                                <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
                                       data-page-size="10">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Date</th>
                                        <th>Transition Id</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $j = 0;
                                    if ($payment != '') {
                                        foreach ($payment as $table) {
                                            $j = $j + 1;
                                            ?>
                                            <tr>
                                                <td><?= $j ?></td>
                                                <td><?= $table['create_date'] ?></td>
                                                <td><?= $table['transition_id'] ?></td>
                                                <td><?= $table['pay_amount'] ?> &#8377;</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr class="active">
                                        <td colspan="9">
                                            <div class="text-right">
                                                <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="rightbar-overlay"></div>
<?php include('footer_link.php'); ?>
</body>


</html>
