        <section class="elements-title space--xxs text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="type--uppercase">  Authentication
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
                                            <li>
                                                <div class="accordion__title">
                                                    <span class="h5">Transaction</span>
                                                </div>
                                                <div class="accordion__content">
                                                    <a id="inrnl_txn" href="<?php echo base_url('user/internal_transaction');?>">Internal Transaction</a>
                                                </div>
                                                <div class="accordion__content">
                                                    <a href="<?php echo base_url('user/internal_txn_form');?>">External Transaction</a>
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
                                            <li>
                                                <div class="accordion__title">
                                                    <span class="h5">User</span>
                                                </div>
                                                <div class="accordion__content">
                                                    <a href="#">Profile</a>
                                                </div>
                                                <div class="accordion__content">
                                                    <a href="#">Request New Address</a>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 masonry__item">
                                <div id="view_form" class="card card-1 boxed boxed--sm boxed--border">

                                    <form class="cart-form" action="<?=base_url('user/success')?>" method="post">



                                        <div class="form-group col-sm-12">
                                            <div class="product col-md-offset-4">
                                                <img alt="Image" style="height: 252px; width: 250px;"; src="<?=$qrcode?>" />
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <label>Input Label:</label>
                                                <input class="validate-required" type="text" name="qrcode" placeholder="OTP" />

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label></label>
                                                <input  type="submit" name="submit" />
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                            <!--end masonry__container-->
                        </div>
                        <!--end masonry-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
        </section>