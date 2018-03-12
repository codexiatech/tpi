<!DOCTYPE html>
<html class="no-js" wtx-context="7F6A66F2-AB09-458B-8A17-12F118B0819B" lang="en"><!-- start: HEAD --><!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]--><!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title> tpi </title>
        <!-- start: META -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description">
        <meta content="" name="author">
        <!-- end: META --> 
        <link rel="shortcut icon" type="image/png" href="favicon.ico">
        <script src="<?=base_url()?>public/user/js/jquery.min.js"></script>
        <script src="<?=base_url()?>public/user/js/jquery-migrate-1.js"></script>
        <script src="<?=base_url()?>public/user/js/jquery-migrate-1.js"></script>
        <!-- start: MAIN CSS -->  
		<link href="<?=base_url()?>public/user/css/bootstrap.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/font-awesome.css">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/demo.css">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/style.css">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/main.css">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/main-responsive.css">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/bootstrap-colorpalette.css">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/perfect-scrollbar.css">
        <link rel="stylesheet/less" type="text/css" href="<?=base_url()?>public/user/css/styles.less"> 
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/theme_light.css" type="text/css" id="skin_color">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/summernote.css">
        <link rel="stylesheet" href="<?=base_url()?>public/user/css/custom.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
        <!-- end: MAIN CSS --> 
    </head>
    <body cz-shortcut-listen="true"> 
            <!--site header-->	
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            <div class="logo-header">
                <a class="navbar-brand" href="<?=base_url();?>user/dashboard"> 
                    <span style="    color: white;
                    padding: 50px 50px;
                    /* margin-top: 20px; */
                    line-height: 1.5em;
                    font-weight: 600;">TPI WALLET</span>
                    <!-- <img src="<?=base_url()?>public/user/img/htc_l.png" class="logo" style="width:20%;margin-left: 50px"> -->
                </a>
            </div>           
        </div>
        <div class="navbar-tools">
            <ul class="nav navbar-right"> 
                <!-- end: LANGUAGE DROPDOWN -->
                <li class="dropdown"> 
                       <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true"> 
                          ETH Balance :
                         <span class="username">  <?= round(($_SESSION['tpi_OrignlEthbal']),8)?> </span> 
                    </a>  
                </li> 
                    <li class="dropdown"> 
                       <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true"> 
                          TPI Balance :
                         <span class="username">  <?= round(($_SESSION['tpi_total_balance']/100000000),8)?> </span> 
                    </a> 
                </li>				
            <!-- end: USER DROPDOWN -->
           </ul>
        <!-- end: TOP NAVIGATION MENU -->
        </div>
</div>
<!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: SITE HEADER -->
<!-- start: MAIN CONTAINER -->
<div class="main-container">
    <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation navbar-collapse collapse">
            <!--div class="user-info-left"> 
                Token Balance
                <br />
                <?=$_SESSION['total_balance']?>
            </div-->
            <!-- start: MAIN MENU TOGGLER BUTTON -->
            <div class="navigation-toggler">
                <i class="clip-chevron-left"></i>
                <i class="clip-chevron-right"></i>
            </div>
            <!-- end: MAIN MENU TOGGLER BUTTON -->  
            <ul class="main-navigation-menu">  
                    <li>  
                        <a style="color: #03a9f4;" href="<?=base_url();?>user/update_balance">
                            <i class="fa fa-refresh"></i>
                            <span class="title">
                                Refresh balance
                            </span>
                            <span class="selected"></span>
                        </a>
                    </li>  
                    <li>           
                        <a href="<?=base_url();?>user/external_transaction">                     
                           <i class="fa fa-fw fa-share"></i>
                            <span class="title">
                                Send Token
                            </span>
                            <span class="selected"></span>
                        </a>
                     </li> 
                     <li>
                        <a href="<?=base_url('user_address');?>">
                            <i class="fa fa-fw fa-download"></i>
                            <span class="title">
                                Receive
                            </span>
                        </a>
                    </li> 
                    
                    <li>           
                        <a  href="https://etherscan.io/address/<?=$_SESSION['tpi_Useraddress']?>#tokentxns" target="_blank">                     
                            <i class="fa fa-fw fa-list"></i>
                            <span class="title">
                               Transaction History
                            </span>
                            <span class="selected"></span>
                        </a>
                     </li>  
                    
                     <!--li>           
                        <a  href="<?=base_url();?>user/exe_history">                     
                            <i class="fa fa-fw fa-list"></i>
                            <span class="title">
                               Transaction History
                            </span>
                            <span class="selected"></span>
                        </a>
                     </li-->  
                     <li>           
                        <a href="<?=base_url();?>user/user_profile">                     
                            <i class="clip-user"></i>
                            <span class="title">
                                Profile
                            </span>
                            <span class="selected"></span>
                        </a>
                    </li> 
                     <li>
                        <a href="<?=base_url('user/faq');?>">
                            <i class="fa fa-question"></i>
                            <span class="title">
                                FAQ
                            </span>
                        </a>
                    </li>
                    <li> <a href="<?=base_url();?>user/logout">                     
                            <i class="clip-switch"></i>
                            <span class="title"> Logout </span>
                           <span class="selected"></span>
                        </a> 
                    </li>
                      
           </ul>
        </div>
        <!-- end: SIDEBAR -->
    </div>
    <!-- start: PAGE -->
    <div class="main-content">
    <div class="container">
			<!-- main content -->
			<div id="main_content" class="container-fluid">  