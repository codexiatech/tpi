<!--sidebar-menu--><div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a><div class="tooltip fade bottom in" style="top: 36px; left: 0.5px; display: block;"><div class="tooltip-arrow"></div><div class="tooltip-inner">Go to Home</div></div> <a href="http://book.urbanrira.com/Author/manage">Product</a><a href="#" class="current">Create</a></div>
        <!--<h1>Categories</h1>-->
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Insert category Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="<?=base_url('admin/exe_action/').$update_id?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Status :</label>
                                <div class="controls">
                                    <select class="span5" name="status">
                                        <option value="0">Pending</option>
                                        <option value="1">Successful</option>
                                        <option value="2">Declined</option>
                                    </select>
                                </div>
                                <label class="control-label">Transaction Id :</label>
                                <div class="controls">
                                <input type="text" name="transaction_id" class="span5" placeholder="Transaction Id" >
                                </div>
                                <div class="form-actions">
                                    <input type="submit" class="btn btn-success" value="submit" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--Footer-part-->