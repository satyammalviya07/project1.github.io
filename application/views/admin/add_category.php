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
        <div class="row mt-4">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card-box">
                    <form role="form" class="parsley-examples" method="post"
                          action="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="hori-pass1" class="col-4 col-form-label">Machine Type Name<span
                                        class="text-danger"></span></label>
                            <div class="col-7">
                                <input id="hori-pass1" type="text" placeholder="Enter Name"
                                       name="category_name"
                                       required
                                       value="<?= $category_name; ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">


                            <div class="row" style="margin-left: 40%; margin-top: 20px">
                                <div class="col-12">
                                    <button type="submit" id="save" class="btn btn-primary waves-effect waves-light">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
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
