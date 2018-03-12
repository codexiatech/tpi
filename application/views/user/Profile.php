<div class="row">
    <div class="col-sm-12"> 
        <ol class="breadcrumb">
            <li>   
                <i class="fa fa-list"></i>
                <a href="#">  Profile </a>
            </li>   
        </ol> 
        <div class="page-header"> </div>
    </div>
</div> 
                        
<div class="col-sm-12 col-md-6">
<div class="panel">
		<!-- main content -->
	       <div id="main_content" class="panel-body">
	       <!-- page heading -->
           <div class="card"> 
           
           
                        <?php
                        if(isset($flash))
                        {
                            echo $flash;
                        }
                        ?>
                            <div class="boxed bg--secondary boxed--lg boxed--border">
                        
                                <form method="post" action="<?=base_url('user/update_name');?>">
                                     <div class="col-md-6">
                                            <label>Email:</label>
                                            <span class="h5"><?=$profile->email;?></span>
                                        </div> 
                                        <div class="col-md-6">
                                            <a class="btn btn--sm btn--primary type--uppercase" href="<?=base_url('user/change_password');?>">
                                            <span class="btn__text">Change Password
                                            </span>
                                            </a>
                                        </div>  
                                       <div class="form-group">
                                            <label>Name:</label>
                                            <input class="validate-required form-control" type="text" value="<?=$profile->name;?>" name="name" placeholder="" /><br />
                                            <input type="submit" name="submit" value="Update Name" class="btn btn-danger btn-sm"/>
                                        </div>
                                </form>
                             </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>

 
