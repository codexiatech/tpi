
<!Doctype html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link href="<?php echo base_url(); ?>public/user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/socicon.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/flickity.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>public/user/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
<div class="nav-container ">
    <div class="bar bar--sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 col-sm-2">
                    <a href="index.html">
                       <!--  <img class="logo logo-dark" alt="logo" src="<?php echo base_url(); ?>public/user/img/logo-yuzu.png" />
                        <img class="logo logo-light" alt="logo" src="<?php echo base_url(); ?>public/user/img/logo-yuzu.png" /> -->
                        TPI
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
    <!--end bar-->
</div>





<head>
    <meta charset="utf-8">
    <title>Create Account</title>

</head>
<body class=" ">
<a id="start"></a>
<div class="main-container">
    <section class="imageblock switchable feature-large height-100">
        <div class="imageblock__content col-md-6 col-sm-4 pos-right">
            <div class="background-image-holder">
                <img alt="image" src="<?php echo base_url(); ?>public/user/img/back.jpg" />
            </div>
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <h2>Create a Account</h2>

                    <form  method="post" action="<?=base_url('user/signup');?>" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <input id="name" type="text" name="name" placeholder="Name"  required>
                                <p class="help-block" style="color: #960004 "><?=form_error('name','<div class="help-block" style="color: red ">', '</div>')?></p>
                            </div>
                            <div class="col-xs-12" style="clear: both;"> 
                                <input id="mobile" type="email"  name="email" placeholder="Email" required>
                                <p class="help-block" style="color: #960004 "><?=form_error('email','<div class="help-block" style="color: red ">', '</div>')?></p>
                            </div>
                            <div class="col-xs-12">
                                <input  type="password" name="password" id="password" placeholder="Password"  required>
                                <p class="help-block" style="color: #960004 "><?=form_error('password','<div class="help-block" style="color: red ">', '</div>')?></p>
                            </div>
                            <div class="col-xs-12">
                                <input  type="password" name="password_confirmation"  placeholder="Confirm Password"  required>
                                <p class="help-block" style="color: #960004 "><?=form_error('password_confirmation','<div class="help-block" style="color: red ">', '</div>')?></p>
                            </div>

                            <div class="col-xs-12">
                                <input type="submit"  name="register" class="btn btn--primary type--uppercase" name="Register">
                            </div>
                            <div class="col-xs-12">
                                         <span class="type--fine-print block">All ready have an account ?
                                            <a href="<?=base_url('user/login')?>">Login Here..</a>
                                        </span>
                            </div>
                        </div>
                        <!--end row-->
                    </form>

                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
</div>
<!--<div class="loader"></div>-->
<script src="<?php echo base_url(); ?>public/user/js/flickity.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/parallax.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/typed.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/isotope.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/ytplayer.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/granim.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/jquery.steps.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/countdown.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/twitterfetcher.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/spectragram.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/smooth-scroll.min.js"></script>
<script src="<?php echo base_url(); ?>public/user/js/scripts.js"></script>
<script type="text/javascript">
    setTimeout(function() {
        $("#message-wrapper").remove();
    }, 400)
</script>
</body>


</html>



