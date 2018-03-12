<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> <a href="#" class="current">Users</a></div>
        <!--<h1>Categories</h1>-->
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Internal Transaction History</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Sender Id</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Coin Type</th>
                            <th>Fees</th>
                            <th>Date Of Creation</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($result as $row)
                        {
                            if($row->coin_type == 'e'){
                                $coin = 'Ethereum';
                            }
                            $i++;
                            ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$row->unique_id?></td>
                                <td><?=$row->address?></td>
                                <td><?=$row->amount?></td>
                                <td><?=$coin?></td>
                                <td><?=$row->fees?></td>
                                <td><?=$row->date_of_creation?></td>
                                
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--Footer-part-->