<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>All Sub Category</title>
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

    <div class="row mt-4">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">All Machines</h4>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-9 text-sm-center form-inline">
                            <div class="form-group mr-2">
                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                    <option value="">Show all</option>
                                    <?php
                                    foreach (getAllRow('tbl_category') as $c_id) {
                                        ?>
                                        <option
                                                value="<?= $c_id['category_name'] ?>"><?= ucwords($c_id['category_name']) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="demo-foo-search" type="text" placeholder="Search"
                                       class="form-control form-control-sm" autocomplete="on">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" style="float: right">
                                <a href="<?= base_url('subCategoryAdd') ?>" class="btn btn-info btn-rounded"
                                ><i class="fa fa-plus"></i> Add Machine</a>
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
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($sub_category as $item) {
                            $i = $i + 1;
                            $id = encryptId($item['sub_category_id']);

                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= ucwords($item['sub_category_name']) ?></td>
                                <td><?php foreach (getAllRow('tbl_category') as $c_id) {
                                        if ($c_id['category_id'] == $item['category_id']) {
                                            echo ucwords($c_id['category_name']);
                                        }
                                    } ?></td>
                                <td>
                                    <a href="upload/machineImage/<?= $item['sub_category_image'] ?>">
                                        <img src="upload/machineImage/<?= $item['sub_category_image'] ?>" width="60"
                                             height="40">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url("subCategoryAdd?id=$id"); ?>"
                                       class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                            <?php
                        } ?>
                        </tbody>
                        <tfoot>
                        <tr class="active">
                            <td colspan="5">
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
