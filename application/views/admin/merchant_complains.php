<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php include('header_link.php'); ?>
    <style>
        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            width: 50%;
            color: black;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
            width: 50%;
            margin-left: 50%;
            color: black;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .time-right {
            float: right;
            color: #aaa;
        }
    </style>
</head>

<body class="boxed-layout">
<?php include('header.php'); ?>
<div class="wrapper">
    <div class="">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">All Category</h4>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-9 text-sm-center form-inline">
                                <div class="form-group mr-2">
                                    <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                        <option value="">Show all</option>
                                        <option value="Active">Active
                                        </option>
                                        <option value="Deactive">Deactive
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
                                <th>Owner Name</th>
                                <th>Shop Name / Address</th>
                                <th>Complain Status</th>
                                <th>Chat Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach ($complains as $com) {
                                $i = $i + 1;
                                $merchant_id = $com['merchant_id']; ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $com['name'] ?></td>
                                    <td><?= $com['shop_name'] ?><br><?= $com['shop_address'] ?></td>
                                    <td><?php if ($com['complain_status'] == 0) {
                                            ?>
                                            <div class="badge font-14 bg-soft-warning text-warning p-1">pending</div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="badge font-14 bg-soft-info text-info p-1">Resolved</div>
                                            <?php
                                        } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("merchantReply?merchant_id=$merchant_id") ?>"
                                           class="btn btn-info waves-effect waves-light btn-rounded">View
                                        </a>

                                    </td>
                                </tr>
                                <?php
                            } ?>
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
</body>
<?php include('footer_link.php'); ?>


</html>
