    <section class="elements-title space--xxs text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="type--uppercase">Internal Transaction
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
                 <?php
                if(isset($flash))
                {
                    echo $flash;
                }
                ?>
                <div class="boxed bg--secondary boxed--lg boxed--border">
                     <form class="col-md-offset-2" method="post" action="<?=base_url('internal_tran/send')?>">
                        <div class="form-group col-md-8">
                            <label>Select Coin Type:</label>
                            <select name="coin_type" id="coin_type">
                                <option>select Bit coin Type</option>
                                <option value="b">Bitcoin</option>
                                <option value="e">Ethereum</option>
                                <option value="l">Litecoin</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label>Receiver Id:</label>
                            <input class="validate-required" type="text" name="receiver_id" placeholder="" />
                        </div>
                        <div class="form-group col-md-8">
                            <label>Amount to be send:</label>
                            <input class="validate-required" id="amount" type="text" name="amount" placeholder="" />
                        </div>
                        <div class="form-group col-md-8">
                            <label>Fees:</label>
                            <input class="validate-required" id="fees" type="text"  value="" readonly/>
                        </div>
                        <div class="form-group col-md-8">
                            <label>Actual Amount:</label>
                            <input class="validate-required" type="text"  id="actual" value="" placeholder="" readonly/>
                        </div>
                        <div class="form-group col-md-8">
                            <input type="submit" name="submit" value="submit"/>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>

<script>
    $(document).ready(function () {
      var fees = $('#fees').val();
        $('#coin_type').change(function () {
            var coin_value = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?=base_url('internal_tran/coin_type')?>",
                data:{coin_value:coin_value},
                success: function(data){
                    //console.log(data);
                    $("#fees").val(data);

                    $('#amount').keyup(function () {
                        if($(this).val() == '')
                        {
                            $("#actual").val('0.0');
                        }
                        else
                        {
                            var x = $(this).val() - data;
                            $("#actual").val(x);
                        }
                    });
                }
            });

        });

    });

</script>