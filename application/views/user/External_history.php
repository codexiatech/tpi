<div class="row">
    <div class="col-sm-12"> 
        <ol class="breadcrumb">
            <li>   
                <i class="fa fa-list"></i>
                <a href="#"> Transaction List </a>
            </li>   
        </ol> 
        <div class="page-header"> </div>
    </div>
</div> 
                        
<div class="col-sm-12 col-md-12">
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
                        <table class = "table table-striped" style="box-shadow: 1px 1px 1px #888888;">

                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Amount</th>
                                <th>Coin Type</th>
                                <th>Transaction Id</th>
                                <th>Fees</th>
                                <th>Date</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i = 0;

                                foreach ($ext_history as $eh) {
                                    $i++;
                            if($eh->coin_type=='b'){
                                $coin = 'Bitcoin';
                            }elseif($eh->coin_type=='e'){
                                $coin = 'Ethereum';
                            }elseif($eh->coin_type=='l'){
                                $coin = 'Litecoin';
                            }
                                    ?>
                                    <tr>
                                      <td><?=$i?></td>
                                      <td><?=$eh->amount?></td>
                                      <td><?=$coin?></td>
                                      <td><a href="https://etherscan.io/tx/<?=$eh->transaction_id?>" target="_blank"><?=$eh->transaction_id?></a></td>
                                      <td><?=$eh->fees?></td>
                                      <td><?=$eh->date_of_creation?></td>
                                  </tr>
                                    <?php
                                }
                            ?>
                            </tbody>

                        </table>
                 
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    