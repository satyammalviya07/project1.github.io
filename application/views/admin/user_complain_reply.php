<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php include('header_link.php'); ?>
    <style>
        .container {

            background-color: #78E08F;
            border-radius: 30px;
            padding-top: 13px;
            margin: 10px 0;
            width: 50%;
            color: black;
        }

        .darker {

            background-color: #82CCDD;
            width: 50%;
            margin-left: 50%;
            color: black;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .time-right {
            float: right;
            color: black;
        }

        .ddd {
            overflow-x: hidden;
            height: 300px;
        }

        .msg {
            border-radius: 10px;
        }

        .ddd::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .ddd::-webkit-scrollbar {
            width: 10px;
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .ddd::-webkit-scrollbar-thumb {
            background-color: #F90;
            border-radius: 10px;
            background-image: -webkit-linear-gradient(45deg,
            rgba(255, 255, 255, .2) 25%,
            transparent 25%,
            transparent 50%,
            rgba(255, 255, 255, .2) 50%,
            rgba(255, 255, 255, .2) 75%,
            transparent 75%,
            transparent)
        }


    </style>
</head>

<body class="boxed-layout" style="overflow-y: hidden">
<?php include('header.php');
$order_id = $this->input->get('order_id');
?>
<div class="wrapper">

    <div class="row mt-4">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title"></h4>

                <div class="row ddd">
                    <a href="#bottom" id="top"><i class="ti-arrow-circle-down" aria-hidden="true"
                                                  style="font-size: 26px"></i></a>
                    <div class="col-md-12 show_msg">
                    </div>
                    <a href="#top" id="bottom"><i style="font-size: 26px" class="ti-arrow-circle-up"
                                                  aria-hidden="true"></i></a>
                </div>

            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-2 ml-5">
        <div class="btn-group dropup">
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Complain Status<i class="mdi mdi-chevron-up"></i></button>
            <div class="dropdown-menu">
                <a class="dropdown-item"
                   href="<?= base_url("complainStatusUser?order_id=$order_id&status=1") ?>">Pending</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"
                   href="<?= base_url("complainStatusUser?order_id=$order_id&status=0") ?>">Resolve</a>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <textarea class="form-control  msg" placeholder="Type your message....."></textarea>
    </div>
    <div class="col-md-1  mt-2">
        <button type="button" class="btn btn-success send"><i
                    class="mdi mdi-send"></i></button>
    </div>
</div>

<div class="rightbar-overlay"></div>
</body>
<?php include('footer_link.php');
$user_id = $this->input->get('user_id');

?>

<script>
    $(document).ready(function () {
        $('#bottom').on('click', function (event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();

                $('.ddd').stop().animate({scrollTop: target.offset().top}, 'show');
            }
        });
        $('#top').on('click', function (event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $(".ddd").animate({scrollTop: $('.ddd').get(0).scrollHeight}, 'slow');
            }
        });

        let user_id = <?= $user_id?>;
        $.ajax({
            url: "<?= base_url('getMsgForUser') ?>",
            type: "POST",
            data: 'user_id=' + user_id,
            success: function (resp) {
                $('.show_msg').html(resp);
            },
            complete: function () {
                $(".ddd").animate({scrollTop: $('.show_msg').get(0).scrollHeight}, 1);

            }
        });

        setInterval(function () {
            let user_id = <?= $user_id?>;
            $.ajax({
                url: "<?= base_url('getMsgForUser') ?>",
                type: "POST",
                data: 'user_id=' + user_id,
                success: function (resp) {
                    $('.show_msg').html(resp);
                }
            });
        }, 1000);


        $('.send').click(function () {
            let msg = $('.msg').val();
            let complain_id = <?= $user_id?>;
            let sender_id = '3';
            $.ajax({
                url: "<?= base_url('sendMsgUser') ?>",
                type: "POST",
                data: {
                    message: msg,
                    user_id: complain_id,
                    sender_id: sender_id
                },
                beforeSend: function () {
                    $(".send").html('<i class="loading">Sending..</i>');
                },
                complete: function () {
                    $(".ddd").animate({scrollTop: $('.show_msg')[0].scrollHeight}, 'slow');
                    $(".send").html('<i class="mdi mdi-send"></i>');
                    $('.msg').val('');

                }
            });
        });
    });
</script>

</html>
