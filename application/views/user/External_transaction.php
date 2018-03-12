<div class="row">
    <div class="col-sm-12"> 
        <ol class="breadcrumb">
            <li>   
                <i class="fa fa-list"></i>
                <a href="#">  Send Token </a>
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
                <div class="boxed bg--secondary boxed--lg boxed--border">
                    <?php
                    if(isset($flash))
                    {
                        echo $flash;
                    }
                    ?>
                        <form class="form-horizontal" method="post" action="<?=base_url('user/save_external_transaction')?>"> 
                            <div class="form-group col-md-12">
                                <label>Address:</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Amount:</label>
                                <input class="validate-required form-control" id="amount" type="text" name="amount" placeholder="" />
                            </div>
                            <div class="form-group col-md-12">
                                <label>Fees In Ether :</label>
                                <input class="validate-required form-control" id="fees" type="text" name="fees" value="<?=$extrnl;?>" readonly />
                            </div>
                           <!-- <div class="form-group col-md-12">
                                <label>Amount to send:</label>
                                <input class="validate-required form-control" id="actual" type="text" name="actual_amount" readonly />
                            </div> -->  
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-danger btn-sm" value="Send Amount" />
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div> 
<!-- <script>
$(document).ready(function () {
    $('#amount').keyup(function () {
    if($(this).val() == '')
        {
            $("#actual").val('0.0');
        }
        else
        {
            var x = $(this).val() - <?=$extrnl;?>;
            $("#actual").val(x);
        }
    });
}); 
</script>  -->