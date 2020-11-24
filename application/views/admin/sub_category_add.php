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
                    <h4 class="page-title">Add Machine</h4>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-lg-12">
                <div class="card-box">
                    <form role="form" class="parsley-examples" method="post" enctype="multipart/form-data"
                          action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Machine Name<span
                                                class="text-danger"></span></label>
                                    <div class="col-8">
                                        <input id="hori-pass1" type="text" placeholder="Enter Machine Name"
                                               name="sub_category_name"
                                               required
                                               value="<?= $sub_category_name; ?>"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Machine Type<span
                                                class="text-danger"></span></label>
                                    <div class="col-7">
                                        <select class="form-control" name="category_id">
                                            <option>select type</option>
                                            <?php
                                            foreach (getAllRow('tbl_category') as $cate) {
                                                ?>
                                                <option
                                                        value="<?= $cate['category_id'] ?>" <?php if ($category_id == $cate['category_id']) {
                                                    echo 'selected';
                                                } ?>><?= ucwords($cate['category_name']) ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 20px">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-2 col-form-label">OverView<span
                                                class="text-danger"></span></label>
                                    <div class="col-10">
                                        <textarea rows="3" name="overview"
                                                  class="form-control"><?= $overview ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top: 20px">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-2 col-form-label">Description<span
                                                class="text-danger"></span></label>
                                    <div class="col-10">
                                        <textarea rows="3" name="description"
                                                  class="form-control"><?= $description ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 20px">
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-4 col-form-label">Machine Name Image<span
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
                                                <input type="file" name="category_image"
                                                       class="chooseFile  file"
                                                       id="uploadImage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="category_image2" value="<?= $sub_category_image; ?>">
                            <p id="uploadImageError"></p>
                            <div class="col-md-12">
                                <img id="blah"
                                     src="<?= base_url("upload/machineImage/$sub_category_image") ?>"
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
