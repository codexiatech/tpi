<div class="row">
    <div class="col-sm-12"> 
        <ol class="breadcrumb">
            <li>   
                <i class="fa fa-list"></i>
                <a href="#">  Address </a>
            </li>   
        </ol> 
        <div class="page-header"> </div>
    </div>
</div> 
                        
<div class="col-sm-12 col-md-8">
<div class="panel">
		<!-- main content -->
	       <div id="main_content" class="panel-body">
	       <!-- page heading -->
           <div class="card"> 
           
                            <div class="boxed bg--secondary boxed--lg boxed--border">
                                <?php
                            if(isset($flash))
                            {
                                echo $flash;
                            }
                            ?>
                           
                            <?php
                            if(count($address3) > 1)
                            {
                                ?>
                                <div id="view_form" class="card card-1 boxed boxed--sm boxed--border">
                                <a class="btn btn--primary" id="add_adrs" href="<?=base_url('user_address/add_eth_add')?>">
                                    <span class="btn__text">Add Ethereum Address</span>
                                </a>
                                </div>
                                <?php
                            }
                            ?> 
                                <?php
                                $i = 0;
                                foreach($address3 as $key=>$add){
                                    $i++;
                                    if($add->coin_type == 'e'){
                                    ?>
                                    
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&amp;data=<?= $add->address; ?>"><br /><br />
                                    <strong>Wallet Address</strong> <br />
                                    <?= $add->address; ?>
                                    <?php
                                    }
                                }
                                ?>

                                
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
