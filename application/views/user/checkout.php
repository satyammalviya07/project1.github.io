<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>Home | Efficient Farming</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php include('header_link.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        @media (min-width: 1366px) and (max-width: 1649px) {
            .layout-4 .box-content2 .box-left {
                width: 100%;
            }

            .layout-4 .box-content2 .extra-right {
                width: 100%;
            }
        }
    </style>

</head>

<body class="common-home res layout-4">

<?php if ($this->session->flashdata('checkLogin') != '') {
    ?>
    <script>
        swal({
            title: "Login",
            text: "<?= $this->session->flashdata('checkLogin')?>",
            icon: "warning",
            button: "Login",
            closeOnClickOutside: false
        }).then(function () {
            window.location = "<?= base_url('userLogin')?>";
        });
    </script>
    <?php
    exit;
}
?>
<div id="wrapper" class="wrapper-fluid banners-effect-10">
    <?php include('header.php'); ?>
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Checkout</a></li>
        </ul>
        <?php
        $getUserD = getRowById('tbl_user_registration', 'user_registration_id', $this->session->userdata('userId'));
        $getMachine = getRowById('tbl_machines', 'machine_id', decryptId($this->input->get('vId')));
        $getMachineDetails = getRowById('tbl_sub_category', 'sub_category_id', $getMachine[0]['sub_category_id']);

        ?>
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <h2 class="title">Checkout</h2>
                <form action="" method="post">
                    <div class="so-onepagecheckout row">
                        <div class="col-left col-sm-3">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                                </div>
                                <div class="panel-body">
                                    <fieldset id="account">
                                        <div class="form-group required">
                                            <label for="input-payment-firstname" class="control-label">First
                                                Name</label>
                                            <input type="text" class="form-control" id="input-payment-firstname"
                                                   placeholder="First Name" value="<?= $getUserD[0]['name'] ?>"
                                                   name="name">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-email" class="control-label">E-Mail</label>
                                            <input type="text" class="form-control" id="input-payment-email"
                                                   placeholder="E-Mail" value="<?= $getUserD[0]['email'] ?>"
                                                   name="email">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-telephone" class="control-label">Phone no</label>
                                            <input type="text" class="form-control" id="input-payment-telephone"
                                                   placeholder="Telephone" value="<?= $getUserD[0]['phone'] ?>"
                                                   name="phone">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                                </div>
                                <div class="panel-body">
                                    <fieldset id="address" class="required">
                                        <div class="form-group required">
                                            <label for="input-payment-address-1" class="control-label">Address 1</label>
                                            <input type="text" class="form-control" id="input-payment-address-1"
                                                   placeholder="Address 1" value="<?= $getUserD[0]['address'] ?>"
                                                   name="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-payment-address-2" class="control-label">Area</label>
                                            <input type="text" class="form-control" id="input-payment-address-2"
                                                   placeholder="Address 2" value="<?= $getUserD[0]['area'] ?>"
                                                   name="area">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-payment-address-2" class="control-label">Pin code</label>
                                            <input type="text" class="form-control" id="input-payment-address-2"
                                                   placeholder="Address 2" value="<?= $getUserD[0]['pincode'] ?>"
                                                   name="pincode">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-city" class="control-label">State</label>
                                            <input type="text" class="form-control" id="input-payment-city"
                                                   placeholder="City" value="<?= $getUserD[0]['state'] ?>" name="state">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-payment-postcode" class="control-label">City</label>
                                            <input type="text" class="form-control" id="input-payment-postcode"
                                                   placeholder="Post Code" value="<?= $getUserD[0]['city'] ?>"
                                                   name="city">
                                        </div>


                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-right col-sm-9">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td class="text-center">Image</td>
                                                        <td class="text-left">Product Name</td>
                                                        <td class="text-left">Area
                                                            in <?= $getMachine[0]['area_type'] ?></td>
                                                        <td class="text-right">Total</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-center">
                                                            <img width="60px"
                                                                 src="<?= base_url("upload/machineImage/") . $getMachineDetails[0]['sub_category_image'] ?>"
                                                                 alt="Xitefun Causal Wear Fancy Shoes"
                                                                 title="Xitefun Causal Wear Fancy Shoes"
                                                                 class="img-thumbnail">
                                                            <input type="hidden" name="machine_id"
                                                                   value="<?= $getMachine[0]['sub_category_id'] ?>">
                                                            <input type="hidden" name="vendor_id"
                                                                   value="<?= $getMachine[0]['vendor_id'] ?>">
                                                        </td>
                                                        <td class="text-left"><?= $getMachineDetails[0]['sub_category_name'] ?>
                                                        </td>
                                                        <td class="text-left">
                                                            <div class="input-group btn-block"
                                                                 style="min-width: 100px;">
                                                                <input type="text" name="total_area"
                                                                       value="<?= $getMachine[0]['area'] ?>" size="1"
                                                                       class="form-control areaChange">
                                                                <span class="input-group-btn">
                                                             <input type="hidden" value="<?= $getMachine[0]['price'] ?>"
                                                                    class="total">
                                                                <input type="hidden"
                                                                       value="<?= $getMachine[0]['area'] ?>"
                                                                       class="area">
										                   </span>
                                                            </div>
                                                            <input type="hidden" name="amount"
                                                                   value="<?= $getMachine[0]['price'] ?>"
                                                                   class="t3">
                                                        </td>

                                                        <td class="text-right "><span
                                                                    class="t1"><?= $getMachine[0]['price'] ?>
                                                                &#8377;</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td class="text-right" colspan="3"><strong>Total:</strong></td>
                                                        <td class="text-right"><span
                                                                    class="t2"><?= $getMachine[0]['price'] ?>
                                                                &#8377;</span>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your
                                                Order</h4>
                                        </div>
                                        <div class="panel-body">
                                        <textarea rows="4" class="form-control" id="confirm_comment"
                                                  name="description"></textarea>
                                            <div class="buttons">
                                                <div class="pull-right">
                                                    <button class="btn btn-primary">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--Middle Part End -->

        </div>
    </div>

</div>
<?php include('footer.php'); ?>

<?php include('footer_link.php'); ?>
</body>
<script>
    $('.areaChange').keyup(function () {
        let b = $(this).val();
        let value = $('.area').val();
        let total = $('.total').val();

        let t = total / value;
        let a = t * b;
        $('.t1').text(a);
        $('.t2').text(a);
        $('.t3').val(a);

    });
</script>
</html>