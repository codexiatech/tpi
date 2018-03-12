<div class="row">
    <div class="col-sm-12"> 
        <ol class="breadcrumb">
            <li>   
                <i class="fa fa-list"></i>
                <a href="#">  Dashboard </a>
            </li>   
        </ol> 
        <div class="page-header"> </div>
    </div>
</div> 
<style>
.card-box {
    background-clip: padding-box;
    background-color: #fff;
    border: 1px solid rgba(54, 64, 74, 0.19);
    border-radius: 3px;
    margin-bottom: 12px;
    padding: 16px 16px 10px;
}
</style>                       
<div class="col-sm-12 col-md-10">
<div class="panel">
		<!-- main content -->
	       <div id="main_content" class="panel-body">
	       <!-- page heading -->
           <div class="card"> 
                    
                    
                    <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 common_box">
                    <div class="">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left"> 
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b> <?= round(($_SESSION['tpi_total_balance']/1000000000000000000),8)?> </b></h3>
                                <p>TPI Balance</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 common_box">
                    <div class="">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left">
                                 
                            </div>
                            <div class="text-right">
                                <h3><b id="widget_count3"><?= round(($_SESSION['tpi_OrignlEthbal']),8)?></b></h3>
                                <p>Ether Balance</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6 common_box">
                  <a href="<?=base_url();?>user/external_transaction">
                    <div class="">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left">
                                <i class="fa fa-fw fa-share text-warning"></i>
                            </div>
                            <div class="text-right">

                                <h3><b id="widget_count3">Send</b></h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                  </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 common_box">
                  <a href="<?=base_url();?>user_address">
                    <div class="">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left">
                                <i class="fa fa-fw fa-download text-warning"></i>
                            </div>
                            <div class="text-right">

                                <h3><b id="widget_count3">Receive</b></h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                  </a>
                </div>
            </div>
                    
            </div>
            <!--end of row-->
        </div>
        
        </div>