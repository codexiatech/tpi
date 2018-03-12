<div class="main-container">

    <section class="elements-title space--xxs text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="type--uppercase">Address
                        <i class="stack-down-dir"></i>
                    </h6>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class=" ">
        <div class="container">
            <div class="row">
                <?php
                if(isset($flash))
                {
                    echo $flash;
                }
                ?>
                <div class="masonry">
                    <div class="masonry__container">
                        <div class="col-sm-4 masonry__item">
                            <div class="card card-1 boxed boxed--sm boxed--border">
                                <div class="card__top">
                                    <div class="card__avatar">
                                                <span>
                                                    <strong>Transaction</strong>
                                                </span>
                                    </div>
                                </div>
                                <div class="card__body">
                                    <ul class="accordion accordion-1">
                                        <li >
                                            <div class="accordion__title">
                                                <span class="h5">Transaction</span>
                                            </div>
                                            <div class="accordion__content">
                                                <a id="inrnl_txn" href="<?php echo base_url('internal_transaction');?>" >Internal Transaction</a>
                                            </div>
                                            <div class="accordion__content">
                                                <a style="color: black;" href="<?php echo base_url('external_transaction');?>">External Transaction</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="accordion__title">
                                                <span class="h5">Transaction History</span>
                                            </div>
                                            <div class="accordion__content">
                                                <a href="#">Internal</a>
                                            </div>
                                            <div class="accordion__content">
                                                <a href="#">External</a>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <div class="accordion__title">
                                                <span class="h5">User</span>
                                            </div>
                                            <div class="accordion__content">
                                                <a href="#">Profile</a>
                                            </div>
                                            <div class="accordion__content">
                                                <a href="<?php echo base_url('user_address');?>">Request New Address</a>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>s
                        </div>
                        <div class="col-sm-8 masonry__item">
                            <div id="view_form" class="card card-1 boxed boxed--sm boxed--border">

                                <form method="post" action="<?=base_url('user_address/edit_add?id='.$_GET['id']);?>">
                                    <div class="form-group col-md-8">
                                        <label>Address:</label>

                                        <textarea name="add"><?php echo $add; ?></textarea>

                                    </div>
                                    <div class="form-group col-md-8">
                                        <input type="submit" name="submit" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end masonry__container-->
            </div>
            <!--end masonry-->
        </div>
        <!--end of row-->
</div>
<!--end of container-->
</section>
<script>
    function confirm_delete(id){
        if(confirm('Do you want delete this address')){
            window.location.href="<?=base_url();?>user_address/delete_add?id="+id;
        }
    }
</script>

