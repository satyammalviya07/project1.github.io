<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>All Merchants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <?php include('header_link.php'); ?>

</head>

<body class="boxed-layout">
<?php include('header.php'); ?>
<?php if ($this->session->flashdata('errors') != '') {
    ?>
    <div id="snackbar"><?= $this->session->flashdata('errors') ?></div>
    <?php
} ?>

<div class="wrapper">
    <div class="">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card-box">
                    <h4 style="text-align: center">All Merchant Details</h4>
                    <hr>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-10 text-sm-center form-inline">
                                <div class="form-group mr-2">
                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                        <option value="">Show all</option>
                                        <option
                                                value="Active">Active
                                        </option>
                                        <option
                                                value="Deactive">Deactive
                                        </option>


                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="demo-foo-search" type="text" placeholder="Search"
                                           class="form-control form-control-sm" autocomplete="on">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
                               data-page-size="10">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Shop Owner Name</th>
                                <th>Shop Name</th>
                                <th>Shop Details / Edit</th>
                                <th>Total Orders</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($merchants as $item) {
                                $i = $i + 1;
                                $id = encryptId($item['vendor_registration_id']);
                                $where = "(tbl_book_prod.booking_status='2' or tbl_book_prod.booking_status='4')";
                                $shop_name = $item['shop_name'];
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['shop_name'] ?></td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-outline-success btn-rounded waves-effect waves-light"
                                                data-toggle="modal"
                                                data-target=".shop_details<?= $i ?>"><i class="fe-eye"></i>View
                                        </button>
                                        <div class="modal fade shop_details<?= $i ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                             style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel">Shop Details</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-box">
                                                                    <div class="row">
                                                                        <div class="col-xl-5">
                                                                            <div class="tab-content pt-0">
                                                                                <div class="tab-pane active show"
                                                                                     id="product-1-item">
                                                                                    <img
                                                                                            src="<?= base_url("upload/shop_image" . '/' . $item['shop_image']) ?>"
                                                                                            alt=""
                                                                                            class="img-fluid mx-auto d-block rounded">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-7">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Owner Name : </strong>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><?= ucwords($item['name']) ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Phone No : </strong>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><?= ucwords($item['phone']) ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Email Address : </strong>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><?= $item['email'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Shop Name : </strong>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><?= ucwords($item['shop_name']) ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Shop Address : </strong>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><?= ucwords($item['address']) ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Shop Area : </strong>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><?= ucwords($item['area']) . '(' . $item['pincode'] . ')' ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <strong>Shop Area : </strong>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><?= ucwords($item['city']) . '(' . $item['state'] . ')' ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("merchantOrderHistory?merchant_id=$id&shop_name=$shop_name") ?>"
                                           type="button"
                                           class="btn btn-outline-warning btn-rounded waves-effect waves-light">
                                            <div class="badge font-14 badge-warning  p-1">
                                                <!--                                                --><? //= getNumRows('tbl_book_prod', 'merchant_id', $item['merchant_id'], $where) ?>
                                            </div>
                                            View
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ($item['shop_status'] == '1') {
                                            ?>
                                            <a href="<?php echo base_url(); ?>admin/Merchant_details/merchant_status/1/<?= $id ?>"
                                               class="btn btn-outline-info btn-rounded waves-effect waves-light">Active</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo base_url(); ?>admin/Merchant_details/merchant_status/0/<?= $id ?>"
                                               class="btn btn-outline-danger btn-rounded waves-effect waves-light">Deactive</a>
                                            <?php
                                        } ?>
                                    </td>
                                </tr>
                                <?php
                            } ?>
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
</div>


<div class="rightbar-overlay"></div>
<?php include('footer_link.php'); ?>
</body>
<script>
    $(document).ready(function () {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    });
</script>
</html>
