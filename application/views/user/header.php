<header id="header" class=" typeheader-4">
    <!-- Header Top -->
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="header-top-left col-lg-6 col-md-4 col-sm-6 col-xs-7">
                </div>
                <div class="header-top-right collapsed-block col-lg-6 col-md-8 col-sm-6 col-xs-5">
                    <ul class="top-link list-inline">
                        <li class="wishlist hidden-sm hidden-xs"><a href="#" id="wishlist-total"
                                                                    class="top-link-wishlist"
                                                                    title="Wish List (0) ">
                                Wish List (0) </a>
                        </li>
                        <li class="checkout hidden-sm hidden-xs"><a href="orderHistory" class="btn-link"
                                                                    title="Checkout "><span><i
                                            class="fa fa-check-square-o"></i>History</span></a>
                        </li>
                        <li>
                            <?php
                            if ($this->session->userdata('userId') == '') {
                                ?>
                                <a href="<?= base_url('userLogin') ?>"><i class="fa fa-lock"></i>Login</a>

                                <?php
                            } else {
                                ?>
                                <a href="<?= base_url('userLogout') ?>"><i
                                            class="fa fa-lock"></i>Logout</a>
                                <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-lg-2 col-md-3 col-sm-12 col-xs-12" style="margin-top: -40px">
                    <div class="logo"><a href=""><img width="100" height="100"
                                                      src="<?= base_url("Assets/efficiant-farming.png") ?>"
                            /></a></div>
                </div>
                <!-- //end Logo -->
                <!-- Search -->
                <div class="middle2 col-lg-7 col-md-6">
                    <div class="search-header-w">
                        <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i></div>
                        <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                            <form method="GET"
                                  action="http://demo.smartaddons.com/templates/html/emarket/index.html">
                                <div id="search0" class="search input-group form-group">
                                    <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                        <select class="no-border" name="category_id">
                                            <option value="0">All Categories</option>
                                            <?php
                                            $getCategory = getAllRow('tbl_category');
                                            foreach ($getCategory as $category) {
                                                ?>
                                                <option value="0"><?= ucwords($category['category_name']); ?></option>
                                                <?php
                                            }
                                            ?>


                                        </select>
                                    </div>

                                    <input class="autosearch-input form-control" type="text" value="" size="50"
                                           autocomplete="off" placeholder="Keyword here..." name="search">
                                    <span class="input-group-btn">
                                    <button type="submit" class="button-search btn btn-primary" name="submit_search"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                                <input type="hidden" name="route" value="product/search"/>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- //end Search -->
                <div class="middle3 col-lg-3 col-md-3">
                    <!--cart-->
                    <?php
                    if ($this->session->userdata('userId') != '') {
                        ?>
                        <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">

                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                                   data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart">
                                    <span class="icon-c">
                                        <i class="fa fa-shopping-bag"></i>
                                    </span>
                                        <div class="shopcart-inner">
                                            <p class="text-shopping-cart">
                                                Hello,
                                            </p>
                                            <span class="total-shopping-cart cart-total-full">
                                            <span class="items_cart"><?= $this->session->userdata('name'); ?></span>
                                        </span>
                                        </div>
                                    </div>
                                </a>

                            </div>

                        </div>
                        <?php
                    }
                    ?>

                    <!--//cart-->
                </div>
            </div>

        </div>
    </div>
    <!-- //Header center -->

    <!-- Header Bottom -->
    <div class="header-bottom hidden-compact">
        <div class="container">
            <div class="row">

                <div class="bottom1 menu-vertical col-lg-2 col-md-3">
                    <!-- Secondary menu -->
                    <div class="responsive so-megamenu  megamenu-style-dev">
                        <div class="so-vertical-menu ">
                            <nav class="navbar-default">

                                <div class="container-megamenu vertical">
                                    <div id="menuHeading">
                                        <div class="megamenuToogle-wrapper">
                                            <div class="megamenuToogle-pattern">
                                                <div class="container">
                                                    <div>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                    All Categories
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-header">
                                        <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                                class="navbar-toggle">
                                            <i class="fa fa-bars"></i>
                                            <span>  All Categories</span>
                                        </button>
                                    </div>
                                    <div class="vertical-wrapper">
                                        <span id="remove-verticalmenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container-mega">
                                                <ul class="megamenu">
                                                    <li class="item-vertical  with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <?php
                                                        $getCategory = getAllRow('tbl_category');
                                                        foreach ($getCategory as $category) {
                                                            ?>
                                                            <a href="#" class="clearfix">
                                                                <span><?= $category['category_name']; ?></span>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- // end Secondary menu -->
                </div>
                <?php
                $directoryURI = $_SERVER['REQUEST_URI'];
                $path = parse_url($directoryURI, PHP_URL_PATH);
                $components = explode('/', $path);
                $first_part = $components[1];
                ?>
                <!-- Main menu -->
                <div class="main-menu col-lg-10 col-md-9">
                    <div class="responsive so-megamenu megamenu-style-dev">
                        <nav class="navbar-default">
                            <div class=" container-megamenu  horizontal open ">
                                <div class="navbar-header">
                                    <button type="button" id="show-megamenu" data-toggle="collapse"
                                            class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="megamenu-wrapper">
                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                        <div class="container-mega">
                                            <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                <li class="<?php if ($first_part == '' or $first_part == 'home') {
                                                    echo "active";
                                                } ?>">
                                                    <a href="<?= base_url() ?>">Home</a>
                                                </li>
                                                <li class="with-sub-menu <?php if ($first_part == 'all_machine' or $first_part == 'sProduct') {
                                                    echo "active";
                                                } ?>">
                                                    <p class="close-menu <?php if ($first_part == 'all_machine') {
                                                        echo "active";
                                                    } ?>"></p>
                                                    <a href="<?= base_url('all_machine') ?>" class="clearfix">
                                                        <strong>All Machine</strong>
                                                    </a>

                                                </li>
                                                <li class="with-sub-menu <?php if ($first_part == 'about_us') {
                                                    echo "active";
                                                } ?>">
                                                    <p class="close-menu"></p>
                                                    <a href="<?= base_url('about_us') ?>" class="clearfix">
                                                        <strong>About Us</strong>
                                                    </a>

                                                </li>
                                                <li class="with-sub-menu">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Contact Us</strong>
                                                    </a>

                                                </li>

                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Support Us</strong>

                                                    </a>

                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- //end Main menu -->
            </div>
        </div>

    </div>

</header>