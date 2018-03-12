<!doctype html>
<html lang="en">

<!-- Mirrored from trystack.mediumra.re/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2017 09:31:06 GMT -->
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
    <link href="<?php echo base_url(); ?>public/user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .social-circle li a {
            display: inline-block;
            position: relative;
            margin: 0 auto 0 auto;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            text-align: center;
            width: 50px;
            height: 50px;
            font-size: 20px;
            background: white;
        }


        .social-circle li i {
            margin: 0;
            line-height: 50px;
            text-align: center;
        }

        .social-circle i {
            color: #fff;
            -webkit-transition: all 0.8s;
            -moz-transition: all 0.8s;
            -o-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
        }
    </style>
</head>
<body>
<div class="nav-container " style="background-color: #f2f2f2;">
    <div class="bar bar--sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 col-sm-2">
                    <a href="<?=base_url()?>">
                        <!--img class="logo logo-dark" alt="logo" src="https://bitcoin.org/img/icons/opengraph.png" />
                        <img class="logo logo-light" alt="logo" src="https://bitcoin.org/img/icons/opengraph.png" /-->
                    </a>
                </div>
                <div class="col-xs-9 col-sm-10 text-right">
                    <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                        <i class="icon icon--sm stack-interface stack-menu"></i>
                    </a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
    <!--end bar-->
    <nav id="menu1" class="bar bar--sm bar-1 hidden-xs ">
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-2 hidden-xs">
                    <div class="bar__module">
                        <a href="<?=base_url()?>">
                            <!--img style="height: 50px;width: 75px" class="logo logo-dark" alt="logo" src="http://www.estoniantrader.com/wp-content/uploads/2016/03/Bitcoin1.png" />
                            <img class="logo logo-light" alt="logo" src="http://www.estoniantrader.com/wp-content/uploads/2016/03/Bitcoin1.png" /-->
                        </a>
                    </div>
                    <!--end module-->
                </div>
                <div class="col-md-11 col-sm-12 text-right text-left-xs text-left-sm">
                    <div class="bar__module">
                        <ul class="menu-horizontal text-left">

                            <!--end module-->
                            <?php
                            if(!isset($_SESSION['tpi']))
                            {
                                ?>
                                <div class="bar__module">
                                    <a class="btn btn--sm type--uppercase" href="<?=base_url('user/signup')?>">
                                    <span class="btn__text">
                                        Create account
                                    </span>
                                    </a>
                                    <a class="btn btn--sm btn--primary type--uppercase" href="<?=base_url('user/login')?>">
                                    <span class="btn__text">
                                       Login
                                    </span>
                                    </a>
                                </div>
                            <?php
                            }else
                            {
                                $CI =& get_instance();
                                $CI->load->model('User_model');
                                $id = $_SESSION['tpi_user_id'];
                                $result = $CI->User_model->_custom_query("select * from user where id = $id");
                                $unique_id = $result->result()[0]->unique_id;
                                $balance_eth = $result->result()[0]->token_amt;

                                ?>
                                <div class="bar__module">
                                    <!-- <span class="btn__text">
                                       User id-<?=$unique_id?>&nbsp;&nbsp;
                                    </span>
                                    <span class="btn__text">
                                        Balance-(ETH-<b><?=$balance_eth?></b></b>)
                                    </span> -->

                                    <a class="btn btn--sm btn--primary type--uppercase" href="<?=base_url('user/dashboard');?>">
                                        <span class="btn__text">
                                       Dashboard
                                    </span>
                                    </a>
                                    <a class="btn btn--sm btn--primary type--uppercase" href="<?=base_url('user/logout')?>">
                                    <span class="btn__text">
                                       Logout
                                    </span>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </ul>

                        <!--end module-->
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
    </nav>
    <!--end bar-->
</div>