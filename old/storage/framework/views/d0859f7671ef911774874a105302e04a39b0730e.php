<?php $__env->startSection('body'); ?>
    <h1 class="page-title">Service Providers
        <small></small>
        
        
        <?php
        
        // print_r($model);
        // print_r($services);
        // print_r($comrade);
        
        
        ?>

    </h1>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Basic Information
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $models): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>

                            <tr>
                                <th>Name</th>
                                <td><?php echo e($models->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Phone number</th>
                                <td><?php echo e($models->phone_no); ?></td>
                            </tr>
                            <tr>
                                <th>Alternate phone number</th>
                                <td><?php echo e($models->alt_ph); ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo e($models->email); ?></td>
                            </tr>
                            <tr>
                                <th>Mailing Address</th>
                                <td><?= $models->mailing_add ?></td>
                            </tr>

                            <tr>
                                <th>NID/Smart Card Number</th>
                                <td><?= $models->smart_card ?></td>
                            </tr>

                            <tr>
                                <th>NID(Front )</th>
                                <td class="logoWrap">

                                    <?php $img = $models->nic_front; ?>
                                    <img src="<?php echo e(url('uploads/SP')); ?>/<?php echo e($img); ?>" alt="NIC FRONT" class="logoImg">

                                </td>
                            </tr>
                            <tr>
                                <th>NID( Back)</th>
                                <?php $back = $models->nic_back; ?>
                                <td class="logoWrap"><img src="<?php echo e(url('uploads/SP')); ?>/<?php echo e($back); ?>" class="logoImg" alt="Nic back"></td>
                            </tr>
                            <tr>
                                <th>Photographs</th>
                                <?php $passport = $models->passport; ?>
                                <td class="logoWrap"><img src="<?php echo e(url('uploads/SP')); ?>/<?php echo e($passport); ?>" class="logoImg" alt="" title=""></td>
                            </tr>
                            <tr>
                                <th>TIN certificate or trade license: *</th>
                                <?php $tin = $models->tin_cer; ?>
                                <td class="logoWrap"><img src="<?php echo e(url('uploads/SP')); ?>/<?php echo e($tin); ?>" class="logoImg" alt="" title=""></td>
                            </tr>
                            </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Business Information
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <th>Service Name	</th>
                        <th>Service Price	</th>
                        <th>SP Amount		</th>
                        <th>Mistri Mama Commission</th>
                        <th>Zone</th>
                        <th>Cluster</th>
                        <th>Commission Type</th>
                        </thead>

                        <tbody>


                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($service->name); ?></td>
                                <td><?php echo e($service->s_price); ?>	</td>
                                <td><?php echo e($service->s_comm); ?></td>
                                <td><?php echo e($service->s_desp); ?></td>
                                <td>Static</td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Payment Information

                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <tbody>
                        <tr>
                            <th>Mobile Banking</th>
                            <td><?= $models->mobile_banking ?></td>
                        </tr>


                        <tr>
                            <th>MFS Account Number </th>
                            <td><?php echo e($models->mfs_account); ?></td>
                        </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if($models->type != 4){ ?>


        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Comrade Information
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <?php $__currentLoopData = $comrade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td><?= $comrads->c_name ?></td>
                            </tr>

                            <tr>
                                <th>Phone No</th>
                                <td><?= $comrads->c_phone_no ?></td>
                            </tr>

                            <tr>
                                <th>Alt Phone No</th>
                                <td><?= $comrads->c_alt_phone_no ?></td>
                            </tr>



                            <tr>
                                <th>Nic Front</th>
                                <?php $nic_front_com = $comrads->c_nic_front; ?>

                                <td class="logoWrap"><img src="<?php echo e(url('uploads/SP')); ?>/<?php echo e($nic_front_com); ?>" class="logoImg" alt="Nic back"></td>
                            </tr>
                            <tr>
                                <th>Nic Back</th>
                                <?php $nic_back_com = $comrads->c_nic_back; ?>

                                <td class="logoWrap"><img src="<?php echo e(url('uploads/SP')); ?>/<?php echo e($nic_back_com); ?>" class="logoImg" alt="Nic back"></td>
                            </tr>
                            <tr>
                                <th>Passport</th>

                                <?php $nic_passport = $comrads->c_passport; ?>

                                <td class="logoWrap"><img src="<?php echo e(url('uploads/SP')); ?>/<?php echo e($nic_passport); ?>" class="logoImg" alt="Nic back"></td>
                            </tr>

                            </tbody>
                        </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
    </div>
    <style>
        .logoImg{
            width: 100px
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.faq.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>