<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>All Products</title>
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
                <h4 class="header-title">All Category</h4>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-9 text-sm-center form-inline">
                            <div class="form-group mr-2">
                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                    <option value="">Show all</option>
                                    <?php
                                    foreach (getAllData('tbl_sub_category') as $sc_id) {
                                        ?>
                                        <option
                                                value="<?= ucwords($sc_id['sub_category_name']) ?>"><?= ucwords($sc_id['sub_category_name']) ?></option>
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
                                <a href="<?= base_url('productAdd') ?>" class="btn btn-info btn-rounded"
                                ><i class="fa fa-plus"></i>Add Product</a>
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
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_product as $item) {
                            $i = $i + 1;
                            $id = encrypt($item['product_id']);
                            $price = explode('|', $item['product_price_with_quantity']);

                            $final = '';
                            foreach ($price as $p) {
                                $f = explode('<=>', $p);
                                $qtyTYpe = getRowById('tbl_quantity_type', 'quantity_type_id', $f[1]);
                                $final = $final . $f[0] . $qtyTYpe[0]['quantity_name'] . ' = ' . $f[2] . ', ';
                            }
                            $replaceStr = lastReplace(',', '', $final);


                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= ucwords($item['product_name']) ?></td>
                                <td><?= $replaceStr ?></td>
                                <td><?php foreach (getAllData('tbl_category') as $c_id) {
                                        if ($c_id['category_id'] == $item['category_id']) {
                                            echo ucwords($c_id['category_name']);
                                        }
                                    } ?>
                                </td>
                                <td><?php foreach (getAllData('tbl_sub_category') as $c_id) {
                                        if ($c_id['sub_category_id'] == $item['sub_cate_id']) {
                                            echo ucwords($c_id['sub_category_name']);
                                        }
                                    } ?>
                                </td>
                                <td>
                                    <a href="upload/products/<?= $item['product_image'] ?>">
                                        <img src="upload/products/<?= $item['product_image'] ?>" width="60"
                                             height="40">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>editProduct?id=<?php echo $id; ?>"
                                       class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                            <?php
                        } ?>
                        </tbody>
                        <tfoot>
                        <tr class="active">
                            <td colspan="7">
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
