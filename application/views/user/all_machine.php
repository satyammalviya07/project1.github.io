<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>Home | Efficient Farming</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php include('header_link.php'); ?>
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

<div id="wrapper" class="wrapper-fluid banners-effect-10">
    <?php include('header.php'); ?>
    <div class="main-container">
        <div id="content">
            <div class="container" style="margin-top: 20px">

                <div class="row box-content2">

                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 extra-right">
                        <div class="module so-extraslider-ltr ">
                            <h3 class="modtitle"><span>All Machine</span></h3>
                            <div class="modcontent">
                                <div class="so-extraslider">
                                    <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes"
                                         data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6"
                                         data-margin="30" data-items_column0="4" data-items_column1="4"
                                         data-items_column2="3" data-items_column3="2" data-items_column4="1"
                                         data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                        <?php
                                        $getMachine = getAllRowsWithOrder('tbl_machines', 'machine_id', 'DESC');
                                        foreach ($getMachine as $machine) {
                                            $machineName = getRowById('tbl_sub_category', 'sub_category_id', $machine['sub_category_id']);
                                            ?>
                                            <div class="item ">
                                                <a href="<?= base_url("sProduct") . '/' . encryptId($machine['machine_id']) ?>"
                                                   target="_self" title="product">
                                                    <div class="product-layout product-grid2 style1">
                                                        <div class="product-thumb transition product-item-container">
                                                            <div class="left-block">
                                                                <div class="product-image-container">
                                                                    <div class="image">
                                                                        <img src="<?= base_url("upload/machineImage") . '/' . $machineName[0]['sub_category_image'] ?>"
                                                                             alt="Ground round enim"
                                                                             style="max-width: 200px; max-height: 140px; width: 200px; height: 120px"
                                                                             class="img-responsive">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="right-block">
                                                                <div class="caption">
                                                                    <h4> <?= $machineName[0]['sub_category_name'] ?>
                                                                    </h4>
                                                                    <p class="price"><span
                                                                                class="price-new"><?= $machine['area'] . '/' . $machine['price'] . '&#8377;'; ?></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="module so-extraslider-ltr extra-layout4 cus1">
                    <div class="form-group col-pre">
                        <div class="m-head">Irrigation</div>
                    </div>
                    <div class="modcontent">
                        <div class="so-extraslider">
                            <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes"
                                 data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6"
                                 data-margin="30" data-items_column0="5" data-items_column1="3" data-items_column2="2"
                                 data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes"
                                 data-loop="no" data-buttonpage="top">
                                <?php
                                $getProduct1 = getRowByIdInOrder('tbl_machines', 'type_id', '4', 'create_date', 'ASC');
                                foreach ($getProduct1 as $p1) {
                                    $getData = getRowById('tbl_sub_category', 'category_id', $p1['type_id']);
                                    $getShop = getRowById('tbl_vendor_registration', 'vendor_registration_id', $p1['vendor_id']);
                                    ?>
                                    <div class="item ">
                                        <div class="product-layout product-grid2 style1">
                                            <div class="product-thumb transition product-item-container">
                                                <a href="<?= base_url("sProduct") . '/' . encryptId($machine['machine_id']) ?>">
                                                    <div class="left-block">
                                                        <div class="product-image-container">
                                                            <div class="image">
                                                                <img src="<?= base_url("upload/machineImage/") . $getData[0]['sub_category_image'] ?>"
                                                                     style="height: 200px; max-height: 200px"
                                                                     class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4> <?= ucwords($getData[0]['sub_category_name']) ?>
                                                            </h4>
                                                            <p class="price"><span class="price-new"><?= $p1['area']; ?>
                                                                    / &#8377;<?= $p1['price']; ?></span>
                                                            </p>
                                                            <h4 class="fa fa-home"><?= $getShop[0]['shop_name']; ?>
                                                                <h5 class="fa fa-map-marker"><?= $getShop[0]['address'] . $getShop[0]['area']; ?>
                                                                </h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="module so-extraslider-ltr extra-layout4 cus1">
                    <div class="form-group col-pre">
                        <div class="m-head">Planting</div>
                    </div>
                    <div class="modcontent">
                        <div class="so-extraslider">
                            <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes"
                                 data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6"
                                 data-margin="30" data-items_column0="5" data-items_column1="3" data-items_column2="2"
                                 data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes"
                                 data-loop="no" data-buttonpage="top">
                                <?php
                                $getProduct1 = getRowByIdInOrder('tbl_machines', 'type_id', '3', 'create_date', 'ASC');
                                foreach ($getProduct1 as $p1) {
                                    $getData = getRowById('tbl_sub_category', 'category_id', $p1['type_id']);
                                    $getShop = getRowById('tbl_vendor_registration', 'vendor_registration_id', $p1['vendor_id']);
                                    ?>
                                    <div class="item ">
                                        <div class="product-layout product-grid2 style1">
                                            <div class="product-thumb transition product-item-container">
                                                <a href="<?= base_url("sProduct") . '/' . encryptId($machine['machine_id']) ?>">
                                                    <div class="left-block">
                                                        <div class="product-image-container">
                                                            <div class="image">
                                                                <img src="<?= base_url("upload/machineImage/") . $getData[0]['sub_category_image'] ?>"
                                                                     style="height: 200px; max-height: 200px"
                                                                     class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4> <?= ucwords($getData[0]['sub_category_name']) ?>
                                                            </h4>
                                                            <p class="price"><span class="price-new"><?= $p1['area']; ?>
                                                                    / &#8377;<?= $p1['price']; ?></span>
                                                            </p>
                                                            <h4 class="fa fa-home"><?= $getShop[0]['shop_name']; ?>
                                                                <h5 class="fa fa-map-marker"><?= $getShop[0]['address'] . $getShop[0]['area']; ?>
                                                                </h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="module so-extraslider-ltr extra-layout4 cus1">
                    <div class="form-group col-pre">
                        <div class="m-head">Tractor and Power</div>
                    </div>
                    <div class="modcontent">
                        <div class="so-extraslider">
                            <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes"
                                 data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6"
                                 data-margin="30" data-items_column0="5" data-items_column1="3" data-items_column2="2"
                                 data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes"
                                 data-loop="no" data-buttonpage="top">
                                <?php
                                $getProduct1 = getRowByIdInOrder('tbl_machines', 'type_id', '1', 'create_date', 'ASC');
                                foreach ($getProduct1 as $p1) {
                                    $getData = getRowById('tbl_sub_category', 'category_id', $p1['type_id']);
                                    $getShop = getRowById('tbl_vendor_registration', 'vendor_registration_id', $p1['vendor_id']);
                                    ?>
                                    <div class="item ">
                                        <div class="product-layout product-grid2 style1">
                                            <div class="product-thumb transition product-item-container">
                                                <a href="<?= base_url("sProduct") . '/' . encryptId($machine['machine_id']) ?>">
                                                    <div class="left-block">
                                                        <div class="product-image-container">
                                                            <div class="image">
                                                                <img src="<?= base_url("upload/machineImage/") . $getData[0]['sub_category_image'] ?>"
                                                                     style="height: 200px; max-height: 200px"
                                                                     class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4> <?= ucwords($getData[0]['sub_category_name']) ?>
                                                            </h4>
                                                            <p class="price"><span class="price-new"><?= $p1['area']; ?>
                                                                    / &#8377;<?= $p1['price']; ?></span>
                                                            </p>
                                                            <h4 class="fa fa-home"><?= $getShop[0]['shop_name']; ?>
                                                                <h5 class="fa fa-map-marker"><?= $getShop[0]['address'] . $getShop[0]['area']; ?>
                                                                </h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="module so-extraslider-ltr extra-layout4 cus1">
                    <div class="form-group col-pre" style="background-color: #e23131">
                        <div class="m-head">Soil Cultivation</div>
                    </div>
                    <div class="modcontent">
                        <div class="so-extraslider">
                            <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes"
                                 data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6"
                                 data-margin="30" data-items_column0="5" data-items_column1="3" data-items_column2="2"
                                 data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes"
                                 data-loop="no" data-buttonpage="top">
                                <?php
                                $getProduct1 = getRowByIdInOrder('tbl_machines', 'type_id', '2', 'create_date', 'ASC');
                                foreach ($getProduct1 as $p1) {
                                    $getData = getRowById('tbl_sub_category', 'category_id', $p1['type_id']);
                                    $getShop = getRowById('tbl_vendor_registration', 'vendor_registration_id', $p1['vendor_id']);
                                    ?>
                                    <div class="item ">
                                        <div class="product-layout product-grid2 style1">
                                            <div class="product-thumb transition product-item-container">
                                                <a href="<?= base_url("sProduct") . '/' . encryptId($machine['machine_id']) ?>">
                                                    <div class="left-block">
                                                        <div class="product-image-container">
                                                            <div class="image">
                                                                <img src="<?= base_url("upload/machineImage/") . $getData[0]['sub_category_image'] ?>"
                                                                     style="height: 200px; max-height: 200px"
                                                                     class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4> <?= ucwords($getData[0]['sub_category_name']) ?>
                                                            </h4>
                                                            <p class="price"><span class="price-new"><?= $p1['area']; ?>
                                                                    / &#8377;<?= $p1['price']; ?></span>
                                                            </p>
                                                            <h4 class="fa fa-home"><?= $getShop[0]['shop_name']; ?>
                                                                <h5 class="fa fa-map-marker"><?= $getShop[0]['address'] . $getShop[0]['area']; ?>
                                                                </h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</div>
<?php include('footer_link.php'); ?>
</body>
</html>