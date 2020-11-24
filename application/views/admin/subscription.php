<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <?php include('header_link.php'); ?>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
</head>

<body class="boxed-layout">
<?php include('header.php'); ?>
<?php if ($this->session->flashdata('errors') != '') {
    ?>
    <div id="snackbar"><?= $this->session->flashdata('errors') ?></div>
    <?php
} ?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card-box">
                    <form role="form" class="parsley-examples" method="post" enctype="multipart/form-data"
                          action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Plan Name<span
                                                class="text-danger"></span></label>
                                    <div class="col-8">
                                        <input id="hori-pass1" type="text" placeholder="Enter Plan Name"
                                               name="subscription_name"
                                               required
                                               value="<?= $subscription_name ?>"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">No of Days<span
                                                class="text-danger"></span></label>
                                    <div class="col-8">
                                        <input id="hori-pass1" type="number" placeholder="Enter no of days"
                                               name="days"
                                               required
                                               value="<?= $days ?>"
                                               class="form-control ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Price<span
                                                class="text-danger"></span></label>
                                    <div class="col-8">
                                        <input id="hori-pass1" type="number" placeholder="Enter Price"
                                               name="price"
                                               required
                                               value="<?= $price ?>"
                                               class="form-control ">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="text-align: center">
                                <button type="submit" id="save" class="btn btn-primary waves-effect waves-light">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="table-responsive">
                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
                               data-page-size="10">
                            <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Plan Name</th>
                                <th>No of Days</th>
                                <th>Price</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            $getAll = getAllData('tbl_subscription');
                            foreach ($getAll as $all):
                                $id = encrypt($all['subscription_id']);
                                ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $all['subscription_name'] ?></td>
                                    <td><?= $all['days'] ?></td>
                                    <td><?= $all['price'] ?></td>
                                    <td>
                                        <a href="<?= base_url("subscription?sId=$id") ?>"
                                           class="btn btn-success">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
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
