<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-tap-highlight" content="no"/>
    <title>Student Details</title>
    <?php include('header_link.php'); ?>
    <style>


        .file-upload {
            display: block;
            text-align: center;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
        }

        .file-upload .file-select {
            display: block;
            border: 2px solid #dce4ec;
            color: #34495e;
            cursor: pointer;
            height: 40px;
            line-height: 40px;
            text-align: left;
            background: #FFFFFF;
            overflow: hidden;
            position: relative;
        }

        .file-upload .file-select .file-select-button {
            background: #dce4ec;
            padding: 0 10px;
            display: inline-block;
            height: 40px;
            line-height: 40px;
        }

        .file-upload .file-select .file-select-name {
            line-height: 40px;
            display: inline-block;
            padding: 0 10px;
        }

        .file-upload .file-select:hover {
            border-color: #34495e;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload .file-select:hover .file-select-button {
            background: #34495e;
            color: #FFFFFF;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload.active .file-select {
            border-color: #3fa46a;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload.active .file-select .file-select-button {
            background: #3fa46a;
            color: #FFFFFF;
            transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .file-upload .file-select input[type=file] {
            z-index: 100;
            cursor: pointer;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .file-upload .file-select.file-select-disabled {
            opacity: 0.65;
        }

        .file-upload .file-select.file-select-disabled:hover {

            display: block;
            border: 2px solid #dce4ec;
            color: #34495e;
            cursor: pointer;
            height: 40px;
            line-height: 40px;
            margin-top: 5px;
            text-align: left;
            background: #FFFFFF;
            overflow: hidden;
            position: relative;
        }

        .file-upload .file-select.file-select-disabled:hover .file-select-button {
            background: #dce4ec;
            color: #666666;
            padding: 0 10px;
            display: inline-block;
            height: 40px;
            line-height: 40px;
        }

        .file-upload .file-select.file-select-disabled:hover .file-select-name {
            line-height: 40px;
            display: inline-block;
            padding: 0 10px;
        }

        input:not([type]).md-input.md-input-success, input[type=color].md-input.md-input-success, input[type=date].md-input.md-input-success, input[type=datetime-local].md-input.md-input-success, input[type=datetime].md-input.md-input-success, input[type=email].md-input.md-input-success, input[type=month].md-input.md-input-success, input[type=number].md-input.md-input-success, input[type=password].md-input.md-input-success, input[type=search].md-input.md-input-success, input[type=tel].md-input.md-input-success, input[type=text].md-input.md-input-success, input[type=time].md-input.md-input-success, input[type=url].md-input.md-input-success, input[type=week].md-input.md-input-success, select.md-input.md-input-success, textarea.md-input.md-input-success {
            border-color: #2C3192;
        }

        .uk-grid span {
            color: red;
        }

        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe" style="background-color: #ECECEC">
<?= include('header.php'); ?>
<?= include('nav_bar.php'); ?>
<?php
if ($this->session->flashdata('errors') != '') {
    ?>
    <div id="snackbar"><?= $this->session->flashdata('errors') ?></div>
    <?php
}
?>
<div id="page_content">
    <div id="page_content_inner">
        <form method="post" action="">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">
                        Add Machine
                    </h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label for="register_password_repeat">Machine Type</label>
                                <div class="uk-width-medium-1-12">
                                    <select class="md-input state"
                                            onchange="getCity(this.value)"
                                            data-uk-tooltip="{pos:'top'}" title="Select State" name="type_id">
                                        <?php
                                        if ($type_id == '') {
                                            ?>
                                            <option value="">Select Type</option>
                                            <?php
                                        } else {
                                            $get = getRowById('tbl_category', 'category_id', $type_id)
                                            ?>
                                            <option value="<?= $get[0]['category_id'] ?>"><?= ucwords($get[0]['category_name']) ?></option>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $state = getAllRow('tbl_category');
                                        foreach ($state as $s) { ?>
                                            <option<?php if ($type_id == $s['category_id']) {
                                                echo "selected";
                                            } ?>
                                                    value="<?= $s['category_id'] ?>"><?= ucwords($s['category_name']) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <span id="state"></span>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label for="register_password_repeat">Machine Name</label>
                                <div class="uk-width-medium-1-12">
                                    <select class="md-input city"
                                            data-uk-tooltip="{pos:'top'}" title="Select City" name="sub_category_id" id="city">
                                        <?php
                                        if ($sub_category_id == '') {
                                            ?>
                                            <option value="">Select Name</option>
                                            <?php
                                        } else {
                                            $allCity = $get = getRowById('tbl_sub_category', 'category_id', $type_id);
                                            foreach ($allCity as $all) {
                                                ?>
                                                <option value="<?= $all['sub_category_id'] ?>"
                                                    <?php
                                                    if ($sub_category_id == $all['sub_category_id']) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                ><?= $all['sub_category_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <span id="citys"></span>
                        </div>

                    </div>
                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label>Enter per area</label>
                                <input type="text" class="md-input md-input-success price" name="area"
                                       value="<?= $area ?>">
                            </div>
                            <span id="price"><?= form_error('area') ?></span>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-form-row">
                                <label>Enter per area cost</label>
                                <input type="number" class="md-input md-input-success area" name="price"
                                       value="<?= $price ?>">
                            </div>
                            <span id="area"><?= form_error('price') ?></span>
                        </div>
                    </div>

                </div>
                <div class="row btnShow" style="margin-top: 20px; text-align: center">
                    <div class="uk-width-medium-1-1">
                        <button type="submit" class="md-btn md-btn-primary md-btn-wave-light save"
                                style=" margin-bottom: 20px;">Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include('footer_link.php'); ?>
<script>
    function getCity(val) {
        $.ajax({
            type: "POST",
            url: "<?= base_url("getMachine")?>",
            data: 'state_id=' + val,
            success: function (data) {

                $("#city").html(data);
            }
        });
    }


    $(document).ready(function () {

        let x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    });

    $('.save').click(function () {
        let name = $('.name').val();
        let price = $('.price').val();
        let area = $('.area').val();


        if (name == '') {
            $('#name').html('<span>Name Field is required</span>');
            return false;
        } else if (price == '') {
            $('#price').html('<span>Phone no Field is required</span>');
            return false;
        } else if (area == '') {
            $('#area').html('<span>Password Field is required</span>');
            return false;
        } else {

        }
    });

</script>
</body>
</html>
