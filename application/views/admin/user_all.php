<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>All Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h4 class="header-title">All Users</h4>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-9 text-sm-center form-inline">
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
                                <th>User Name</th>
                                <th>Email / Phone</th>
                                <th>Address</th>
                                <th>Area / Pincode</th>
                                <th>State / City</th>
                                <th>Total Orders</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($users as $item) :
                                $i = $i + 1;
                                $id = encryptId($item['user_registration_id']);
                                $where = "(tbl_book_prod.booking_status='2' or tbl_book_prod.booking_status='4')";
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['email'] ?><br><?= $item['phone'] ?></td>
                                    <td><?= $item['address'] ?></td>
                                    <td><?= $item['area'] ?><br><?= $item['pincode'] ?></td>
                                    <td><?= $item['state'] ?><br><?= $item['city'] ?></td>
                                    <td>
                                        <a href="<?= base_url("userOrderHistory?user_id=$id") ?>"
                                           class="btn btn-secondary">
                                           View
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ($item['user_status'] == '1') {
                                            ?>
                                            <a href="<?php echo base_url(); ?>admin/User_details/user_status/1/<?= $id ?>"
                                               class="btn btn-outline-info btn-rounded waves-effect waves-light">Active</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo base_url(); ?>admin/User_details/user_status/0/<?= $id ?>"
                                               class="btn btn-outline-danger btn-rounded waves-effect waves-light">Deactive</a>
                                            <?php
                                        } ?>

                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr class="active">
                                <td colspan="8">
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
