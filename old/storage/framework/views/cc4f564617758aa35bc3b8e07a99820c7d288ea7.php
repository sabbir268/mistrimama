<?php $__env->startSection('content'); ?>
<div class="headershadow paddtb">
    <section class="genSection dashboardPage">
        <div class="container">
            <div class="dashboardInner">
                <div class="dashboardLeft">
                    <?php echo $__env->make('web.users.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>	
                <div class="dashboardRight">

                    <div class="blocklistPage">

                        <div class="personalInfo">
                            <h3>My Cart</h3>
                             
                            <div class="subscrip_sec">

                                <!--            <h5>Your Bill Details</h5>-->
                                <div class="infoForm">






                                    <section class="searchWrap">
                                       
                                            <div class="serachList">
                                               
                                                    <div class="row flex">
                                            <?php $number = count(Session::get('mycat'));?>
                                                 <?php if($number>0): ?>   
                                                    <?php for($i=0; $i<$number;$i++): ?>
                                                       <div class="col-5 col">
                                                            <div class="lists">
                                                                         <p><strong>Service Category:</strong>
                                                                           <?php echo e(Session::get('myServiceCatName')[$i]); ?>

                                                                        </p>
                                                                        
                                                                        <p><strong> Quantity :</strong>
                                                                           <?php echo e(Session::get('myqty')[$i]); ?>

                                                                        </p>
                                                                        
                                                                        <p><strong> CatPrice :</strong>
                                                                           <?php echo e(Session::get('CatPrice')[$i]); ?>

                                                                        </p>

                                                                        <p><strong>Booking Date:</strong>
                                                                            <?php echo e(Session::get('mydate')[0]); ?>

                                                                        </p>
                                                                        <p><strong>Booking Time:</strong>
                                                                            <?php echo e(Session::get('mytime')[0]); ?>

                                                                        </p>
                                                                    </div>
                                                                   
                                                                </div>
                                                                  <?php endfor; ?>
                                                                  <div class="col-5 col">
                                                                <div class="rightUser user_red_flag">
                                                                    <a class="btn btn-primary" style="line-height: 20px !important; " href="<?php echo e(url('all-booking-store')); ?>">checkout</a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  <?php endif; ?>
                                                    </div>
                                                    </div>
                                    </section>








































                                    <div class="pagination">
                                        <?php echo $models->appends(Input::except('page'))->render(); ?>

                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>