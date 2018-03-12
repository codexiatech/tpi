<div class="main-container">

    <section class="elements-title space--xxs text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="type--uppercase">Internal Transaction History
                        <i class="stack-down-dir"></i>
                    </h6>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

                     <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-md-offset-2">
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
                                        <th>Receiver id</th>
                                        <th>Amount</th>
                                        <th>Coin Type</th>
                                        <th>Fees</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php

                                    $i = 0;
                                      foreach ($return->result() as $row):
                                          $i++;
                                          if($row->coin_type=='b'){
                                        $coin = 'Bitcoin';
                                    }elseif($row->coin_type=='e'){
                                        $coin = 'Ethereum';
                                    }elseif($row->coin_type=='l'){
                                        $coin = 'Litecoin';
                                    }
                                          ?>
                                          <tr>
                                              <td><?=$i?></td>
                                              <td><?=$row->receiver_id?></td>
                                              <td><?=$row->amount?></td>
                                              <td><?=$coin?></td>
                                              <td><?=$row->fees?></td>
                                              <td><?=$row->date_of_creation?></td>
                                          </tr>
                                    <?php
                                      endforeach;
                                    ?>
                                    </tbody>

                                </table>
                             
                            </div>
                        </div>
                    </div>
                    
                </div>