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
                                <h3>My Order</h3>
                                <div class="subscrip_sec">
                                    <div class="infoForm">
                                        <section class="searchWrap">
                                        
                                            <?php if(!empty($models)): ?>
                                                <div class="serachList">
                                                    
                                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $dt = $model->booking_sub_cat; ?>
                                                    <div class="row flex">
                                                        <div class="col-5 col">
                                                            <div class="lists">
                                                                <div class="leftUser">
                                                                    <div a="listIteam">
                                                                        <p><strong>Service Area:</strong>
                                                                            <?php if($model->area != null): ?>
                                                                                <?php echo e($model->area); ?>

                                                                            <?php endif; ?>
                                                                        </p>
                                                                        <p><strong>Service Category:</strong>
                                                                            <?php if($model->category != null): ?>
                                                                                <?php echo e($model->category->name); ?>

                                                                            <?php endif; ?>
                                                                        </p>
                                                                        <p>
                                                                            <strong>Booking Date:</strong>
                                                                            <?php echo e($model->booking_date); ?>

                                                                        </p>
                                                                        <p>
                                                                            <strong>Booking Time:</strong>
                                                                            <?php echo e($model->booking_time); ?>

                                                                        </p>

                                                                    </div>
                                                                </div>
                                                                <div class="rightUser user_red_flag">
                                                                    <ul>
                                                                        <li>&nbsp</li>
                                                                    </ul>
                                                                    <a href="<?php echo e(route('user-order-details',['url'=>encrypt($model->id)])); ?>">View</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="noDate mb-5">
                                                    <p>No Records Found</p>
                                                </div>
                                            <?php endif; ?>
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