<?php $__env->startSection('content'); ?>
<!--header close-->
<div class="headershadow paddtb">
    <section class="genSection dashboardPage">
        <div class="container">
            <?php echo $__env->make('common.flashmessage', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="dashboardInner">
                <div class="dashboardLeft">
                    
                        <?php echo $__env->make('web.users.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                   

                </div>	
                <div class="dashboardRight">
                    <div class="accountPage">



                         
                        
                         

                        <div class="personalInfo">
                            <h3>Referral</h3>
                            <div class="infoForm">
 
                                 
                                <div class="formRow">
                                    <label>No referral found</label>
                                     
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




<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>