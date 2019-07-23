<?php $__env->startSection('content'); ?>

    <div class="headershadow paddtb">
        <section class="genSection dashboardPage">
            <div class="container">
                <div class="dashboardInner">
                    <div class="dashboardLeft">
                        <?php echo $__env->make('web.users.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="dashboardRight">
                        <div class="blocklistDetailsPage">
                            <div class="personalInfo">
                                <h3>Order Details</h3>
                                <div class="infoForm">

                                    <section class="searchWrap">
                                        <div class="serachList">

                                            <div class="row flex">

                                                <div class="col-5 col">
                                                    <div class="lists">
                                                        <div class="leftUser">
                                                            <div class="listIteam">
                                                                <p><strong>Service Area:</strong>
                                                                      <?php if($model->area != null): ?>
                                                                                <?php echo e($model->area); ?>

                                                                            <?php endif; ?>
                                                                </p>
                                                                <p>
                                                                    <strong>Service
                                                                        Category:</strong><?php echo e($model->category->name); ?>

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
                                                            <p><strong>Category</strong></p>
                                                            <ul>
                                                                <?php if(!empty($model->subCategory)): ?>
                                                                    <?php $__currentLoopData = $model->subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <strong>
                                                                                <?php echo e($category->name); ?>

                                                                            </strong>
                                                                            <?php echo e($category->qnty); ?>

                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </ul>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </section>


                                </div>
                                <div class="subscrip_sec infoForm">


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