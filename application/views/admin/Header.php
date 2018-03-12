<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/matrix-media.css" />
    <link href="<?=base_url()?>Public/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>Public/admin/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h3>TPI Admin</h3>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        
        <li class=""><a title="" href="<?=base_url('admin/logout')?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="<?php if($this->uri->segment(2) == 'fees'){echo 'active';}?>"> <a href="<?=base_url('admin/fees')?>"><i class="icon icon-signal"></i> <span>Fees</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'external'){echo 'active';}?>"> <a href="<?=base_url('admin/external')?>"><i class="icon icon-signal"></i> <span>External Transaction Request</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'external_txn_history'){echo 'active';}?>"> <a href="<?=base_url('admin/external_txn_history')?>"><i class="icon icon-signal"></i> <span>External Transaction History</span></a> </li>
        
        <li class="<?php if($this->uri->segment(2) == 'view_user'){echo 'active';}?>"> <a href="<?=base_url('admin/view_user')?>"><i class="icon icon-signal"></i> <span>View Users</span></a> </li>
        <li class="<?php if($this->uri->segment(2) == 'view_eth_address'){echo 'active';}?>"> <a href="<?=base_url('admin/view_eth_address')?>"><i class="icon icon-signal"></i> <span>Eth Addresses</span></a> </li>
    </ul>
</div>
<!--sidebar-menu-->