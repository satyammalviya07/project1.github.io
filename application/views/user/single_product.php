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
    <div class="main-container container">
        <ul class="breadcrumb">

        </ul>
        <?php

        $caegory = getRowById('tbl_category', 'category_id', $details[0]['type_id']);
        $productData = getRowById('tbl_sub_category', 'sub_category_id', $details[0]['sub_category_id']);

        ?>

        <div class="row">
            <div id="content" class="col-md-9 col-sm-8">
                <div class="product-view">
                    <div class="left-content-product">
                        <div class="row">
                            <div class="content-product-left col-md-6 col-sm-12 col-xs-12">
                                <div id="thumb-slider" class="thumb-vertical-outer">
                                    <ul class="thumb-vertical">
                                        <li class="owl2-item">
                                            <a data-index="0" class="img thumbnail"
                                               data-image="<?= base_url('upload/machineImage/') . $productData[0]['sub_category_image'] ?>"
                                               title="Canon EOS 5D">
                                                <img src="<?= base_url('upload/machineImage/') . $productData[0]['sub_category_image'] ?>"
                                                     title="Canon EOS 5D"
                                                     alt="Canon EOS 5D">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="large-image  vertical">
                                    <img itemprop="image" class="product-image-zoom"
                                         src="<?= base_url('upload/machineImage/') . $productData[0]['sub_category_image'] ?>"
                                         data-zoom-image="<?= base_url('upload/machineImage/') . $productData[0]['sub_category_image'] ?>"
                                         title="Chicken swinesha" alt="Chicken swinesha">
                                </div>
                            </div>

                            <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                                <div class="title-product">
                                    <h1><?= ucwords($productData[0]['sub_category_name']) ?></h1>
                                </div>
                                <!-- Review ---->
                                <div class="box-review form-group">

                                </div>

                                <div class="product-label form-group">

                                    <div class="stock"><span>Availability:</span> <span
                                                class="status-stock">Available</span>
                                    </div>
                                </div>

                                <div class="product-box-desc">
                                    <div class="inner-box-desc">
                                        <div class="price-tax"><span>Area</span> <?= $details[0]['area'] ?></div>
                                        <div class="reward"><span>Price</span> <?= $details[0]['price'] ?></div>

                                    </div>
                                </div>

                                <div class="short_description form-group">
                                    <h4><strong>OverView</strong></h4>
                                    <?= $productData[0]['overview'] ?>
                                </div>
                                <div id="product">

                                    <div class="form-group box-info-product">
                                        <div class="option quantity">

                                        </div>
                                        <a class="btn btn-primary btn-default"
                                           href="<?= base_url('checkoutPage?vId=') . encryptId($details[0]['machine_id']) ?>">Book
                                            Now</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="producttab ">
                    <div class="tabsslider horizontal-tabs  col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li>
                            <li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li>
                        </ul>
                        <div class="tab-content col-xs-12">
                            <div id="tab-1" class="tab-pane fade active in">
                                <p>
                                    <?= $productData[0]['description'] ?>
                                </p>


                            </div>
                            <div id="tab-review" class="tab-pane fade">
                                <form>
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong>Super Administrator</strong></td>
                                                <td class="text-right">29/07/2015</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <p>Best this product opencart</p>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right"></div>
                                    </div>
                                    <h2 id="review-title">Write a review</h2>
                                    <div class="contacts-form">
                                        <div class="form-group"><span class="icon icon-user"></span>
                                            <input type="text" name="name" class="form-control" value="Your Name"
                                                   onblur="if (this.value == '') {this.value = 'Your Name';}"
                                                   onfocus="if(this.value == 'Your Name') {this.value = '';}">
                                        </div>
                                        <div class="form-group"><span class="icon icon-bubbles-2"></span>
                                            <textarea class="form-control" name="text"
                                                      onblur="if (this.value == '') {this.value = 'Your Review';}"
                                                      onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
                                        </div>
                                        <span style="font-size: 11px;"><span class="text-danger">Note:</span>						HTML is not translated!</span>

                                        <div class="form-group">
                                            <b>Rating</b> <span>Bad</span>&nbsp;
                                            <input type="radio" name="rating" value="1"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="2"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="3"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="4"> &nbsp;
                                            <input type="radio" name="rating"
                                                   value="5"> &nbsp;<span>Good</span>

                                        </div>
                                        <div class="buttons clearfix"><a id="button-review"
                                                                         class="btn buttonGray">Continue</a></div>
                                    </div>
                                </form>
                            </div>
                            <div id="tab-4" class="tab-pane fade">
                                <a href="#">Monitor</a>,
                                <a href="#">Apple</a>
                            </div>
                            <div id="tab-5" class="tab-pane fade">
                                <p>Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore
                                    magna aliquyam erat, sed diam voluptua.
                                    At vero eos et accusam et justo duo
                                    dolores et ea rebum. Stet clita kasd
                                    gubergren, no sea takimata sanctus est
                                    Lorem ipsum dolor sit amet. Lorem ipsum
                                    dolor sit amet, consetetur sadipscing
                                    elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam
                                    erat, sed diam voluptua. </p>
                                <p>At vero eos et accusam et justo duo dolores
                                    et ea rebum. Stet clita kasd gubergren,
                                    no sea takimata sanctus est Lorem ipsum
                                    dolor sit amet. Lorem ipsum dolor sit
                                    amet, consetetur sadipscing elitr.</p>
                                <p>Sed diam nonumy eirmod tempor invidunt
                                    ut labore et dolore magna aliquyam erat,
                                    sed diam voluptua. At vero eos et accusam
                                    et justo duo dolores et ea rebum. Stet
                                    clita kasd gubergren, no sea takimata
                                    sanctus est Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>

<?php include('footer_link.php'); ?>
</body>
</html>