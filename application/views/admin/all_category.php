<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>All Machine Type</title>
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
    <div class="row" style="margin-top: 20px">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">All Machine Type</h4>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-9 text-sm-center form-inline">
                            <div class="form-group mr-2">
                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                    <option value="">Show all</option>
                                    <option value="active">Active</option>
                                    <option value="disabled">Disabled</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="demo-foo-search" type="text" placeholder="Search"
                                       class="form-control form-control-sm" autocomplete="on">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" style="float: right">
                                <a href="<?= base_url('addCategory') ?>" class="btn btn-info btn-rounded"
                                ><i class="fa fa-plus"></i> Add Machine Type</a>
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
                            <th>Category Name</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($category as $item) {
                            $i = $i + 1;
                            $id = encryptId($item['category_id']);
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= ucwords($item['category_name']) ?></td>

                                <td>
                                    <a href="<?php echo base_url(); ?>addCategory?id=<?php echo $id; ?>"
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
