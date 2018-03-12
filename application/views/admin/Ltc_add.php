
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Currency</th>
                  <th>Public</th>
                  <th>Private</th>
                </tr>
              </thead>
                            <tbody>
                <?php
                $n = 0;
                foreach($address as $add){
                  if($add->coin_type == 'b'){
                    $coin = 'Bitcoin';
                  }elseif($add->coin_type == 'l'){
                    $coin = 'Litecoin';
                  }elseif($add->coin_type == 'e'){
                    $coin = 'Ethereum';
                  }
                  $n++;
                  ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$add->name?></td>
                    <td><?=$add->address?></td>
                    <td><?=$coin?></td>
                    <td>
                           <a href="#myModal<?=$n?>" data-toggle="modal" class="btn btn-success">View Public</a> 
                            <div id="myModal<?=$n?>" class="modal hide">
                              <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Public</h3>
                              </div>
                              <div class="modal-body">
                                <p><?=$add->public?></p>
                              </div>
                            </div>
                    </td>
                    <td>
                         <a href="#myModal<?php echo $n.'pr';?>" data-toggle="modal" class="btn btn-success">View Private</a> 
                            <div id="myModal<?php echo $n.'pr';?>" class="modal hide">
                              <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Private</h3>
                              </div>
                              <div class="modal-body">
                                <p><?=$add->private?></p>
                              </div>
                            </div>
                    </td>
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
  </div>
</div>
<!--Footer-part-->
