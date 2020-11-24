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
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                            <li class="breadcrumb-item active">Boxed layout</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Boxed layout</h4>
                    <?php print_r($this->session->userdata('name')); ?>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom"
                       title="" data-original-title="More Info"></i>
                    <h4 class="mt-0 font-16">Income Status</h4>
                    <h2 class="text-primary my-3 text-center">$<span data-plugin="counterup">31,570</span></h2>
                    <p class="text-muted mb-0">Total income: $22506 <span class="float-right"><i
                                    class="fa fa-caret-up text-success mr-1"></i>10.25%</span></p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom"
                       title="" data-original-title="More Info"></i>
                    <h4 class="mt-0 font-16">Sales Status</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">683</span></h2>
                    <p class="text-muted mb-0">Total sales: 2398 <span class="float-right"><i
                                    class="fa fa-caret-down text-danger mr-1"></i>7.85%</span></p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom"
                       title="" data-original-title="More Info"></i>
                    <h4 class="mt-0 font-16">Recent Users</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">3.2</span>M</h2>
                    <p class="text-muted mb-0">Total users: 121 M <span class="float-right"><i
                                    class="fa fa-caret-up text-success mr-1"></i>3.64%</span></p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom"
                       title="" data-original-title="More Info"></i>
                    <h4 class="mt-0 font-16">Total Revenue</h4>
                    <h2 class="text-primary my-3 text-center">$<span data-plugin="counterup">68,541</span></h2>
                    <p class="text-muted mb-0">Total revenue: $1.2 M <span class="float-right"><i
                                    class="fa fa-caret-up text-success mr-1"></i>17.48%</span></p>
                </div>
            </div>
        </div>
    </div>


    <?php include('footer.php'); ?>

    <div class="rightbar-overlay"></div>
    <?php include('footer_link.php'); ?>
</body>
</html>
