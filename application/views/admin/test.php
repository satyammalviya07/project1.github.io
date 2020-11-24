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
<?php if ($this->session->flashdata('errors') != '') {
    ?>
    <div id="snackbar"><?= $this->session->flashdata('errors') ?></div>
    <?php
} ?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Product</h4>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card-box">
                    <form role="form" class="parsley-examples" method="post" enctype="multipart/form-data"
                          action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Item Name<span
                                            class="text-danger"></span></label>
                                    <div class="col-8">
                                        <input id="hori-pass1" type="text" placeholder="Enter Product Name"
                                               name="product_name"
                                               required
                                               value="<?= set_value('product_name'); ?>"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Company Name<span
                                            class="text-success">(optional)</span></label>
                                    <div class="col-8">
                                        <input id="hori-pass1" type="text" placeholder="Enter Company Name"
                                               name="company_name"
                                               required
                                               value="<?= set_value('company_name'); ?>"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Category<span
                                            class="text-danger"></span></label>
                                    <div class="col-8">
                                        <select class="form-control" name="category_id"
                                                onchange="getCategory(this.value)">
                                            <option value="<?= $category_id; ?>">select category</option>
                                            <?php
                                            foreach (getAllData('tbl_category') as $cate) {
                                                ?>
                                                <option
                                                    value="<?= $cate['category_id'] ?>" <?php if ($category_id == $cate['category_id']) {
                                                    echo 'selected';
                                                } ?>><?= $cate['category_name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Sub Category<span
                                            class="text-danger"></span></label>
                                    <div class="col-7">
                                        <select class="form-control" name="sub_cate_id" id="sub_category">
                                            <?php if ($sub_cate_id == '') {
                                                ?>
                                                <option value="">select sub category</option>
                                                <?php
                                            } else {
                                                foreach (getAllData('tbl_sub_category') as $sub_cate) {
                                                    ?>
                                                    <option value="<?= $sub_cate['sub_category_id'] ?>" <?php if ($sub_cate['sub_category_id'] == $sub_cate_id) {
                                                        echo "selected";
                                                    } ?>><?= $sub_cate['sub_category_name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                            } ?>

                                        </select>
                                    </div>
                                    <div class="col-1">
                                        <i class="fa fa-spinner fa-spin loader"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addRow mt-2">
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="hori-pass1" class="col-4 col-md-4 col-form-label">Quantity
                                            <span class="text-danger"></span>
                                        </label>
                                        <div class="col-8 col-md-8">
                                            <input id="hori-pass1" type="text" placeholder="Enter Product Quantity"
                                                   name="product_price" required value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="hori-pass1" class="col-4 col-form-label">Quantity Type<span
                                                class="text-danger"></span></label>
                                        <div class="col-8">
                                            <select class="form-control">
                                                <option value="">Select type</option>
                                                <?php $getType = getAllData('tbl_quantity_type');
                                                foreach ($getType as $type) { ?>
                                                    <option
                                                    value="<?= $type['quantity_type_id'] ?>"><?= $type['quantity_name'] ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label for="hori-pass1" class="col-4 col-form-label">Price<span
                                                class="text-danger"></span></label>
                                        <div class="col-8">
                                            <input id="hori-pass1" type="text" placeholder="Enter Product Price"
                                                   name="product_price"
                                                   required
                                                   value="<?= $product_price; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-success add"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Product Image<span
                                            class="text-danger"></span></label>
                                    <div class="col-7">
                                        <div class="file-upload">
                                            <div class="file-select">
                                                <div class="file-select-button" id="fileName">
                                                    Choose File
                                                </div>
                                                <div class="file-select-name" id="noFile">No
                                                    file chosen...
                                                </div>
                                                <input type="file" name="product_image"
                                                       class="chooseFile  file"
                                                       id="uploadImage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="product_image2" value="<?= $product_image2; ?>">
                            <p id="uploadImageError"></p>
                            <div class="col-md-12">
                                <img id="blah"
                                     src="<?= base_url("upload/products/$product_image2") ?>"
                                     style="width:200px; height:200px">
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

    </div>
</div>


<div class="rightbar-overlay"></div>
<?php include('footer_link.php'); ?>
</body>
<script>
    $(document).ready(function () {
        $(".loader").hide();
    });

    let i = 0;
    $('.add').click(function () {
        i++;
        $('.addRow').append('<div class="row" id="row' + i + '">' +
            '<div class="col-md-4">' +
            '<div class="form-group row">' +
            '<label for="hori-pass1" class="col-4 col-md-4 col-form-label">Quantity' +
            '<span class="text-danger"></span>' +
            '</label>' +
            '<div class="col-8 col-md-8">' +
            '<input id="hori-pass1" type="text" placeholder="Enter Product Quantity" name="product_price" required value="" class="form-control">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<div class="form-group row">' +
            '<label for="hori-pass1" class="col-4 col-form-label">Quantity Type<span class="text-danger"></span></label>' +
            '<div class="col-8">' +
            '<select class="form-control"><option value="">Select type</option><?php foreach ($getType as $type) { ?><option value="<?php echo $type['quantity_type_id'] ?>"><?php echo $type['quantity_name'] ?></option><?php } ?></select>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="form-group row">' +
            '<label for="hori-pass1" class="col-4 col-md-4 col-form-label">Quantity' +
            '<span class="text-danger"></span>' +
            '</label>' +
            '<div class="col-8 col-md-8">' +
            '<input id="hori-pass1" type="text" placeholder="Enter Product Quantity" name="product_price" required value="" class="form-control">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-1">' +
            '<button type="button" class="btn btn-dark remove" id="' + i + '"><i class="fa fa-minus"></i></button>' +
            '</div>' +
            '</div>'
        );
    });

    $(document).on('click', '.remove', function () {
        let id = $(this).attr('id');
        $('#row' + id).remove();
    });

    function getCategory(val) {
        $.ajax({
            type: "POST",
            url: "<?= base_url("admin/Item_details/get_sub_category")?>",
            data: 'category_id=' + val,
            beforeSend: function () {
                $(".loader").show();
            },
            success: function (data) {
                $("#sub_category").html(data);
                $(".loader").hide();
            }
        });
    }
</script>
<?php
if ($this->input->get('id') == '') {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#save').attr('disabled', true);
            $('#blah').hide();
        });
        $('#uploadImage').change(function () {
            sendFile(this.files[0]);
        });

        $('.chooseFile').bind('change', function () {
            var filename = $(".chooseFile").val();
            if (/^\s*$/.test(filename)) {
                $(".file-upload").removeClass('active');
                $("#noFile").text("No file chosen...");
            } else {
                $(".file-upload").addClass('active');
                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
            }
        });

        function sendFile(file) {
            var ext = file.name.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
                $('#uploadImageError').html('<br><div class="alert alert-danger" role="alert"> <strong>Error!</strong> Only JPG, JPEG and PNG extension allowed.</div>');
                $('#blah').hide();
            } else {
                $('#save').removeAttr('disabled');

            }
        }


    </script>
    <?php
}
?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#blah').show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#uploadImage").change(function () {
        readURL(this);
    });
</script>
</html>
