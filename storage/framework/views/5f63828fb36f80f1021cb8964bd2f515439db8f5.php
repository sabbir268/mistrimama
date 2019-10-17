<?php $__env->startSection('body'); ?>
<h1 class="page-title">Service Providers
    <small></small>



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
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo e($serviceProvider->name ? $serviceProvider->name : "-"); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone number</th>
                                    <td><?php echo e($serviceProvider->phone_no); ?></td>
                                </tr>
                                <tr>
                                    <th>Alternate phone number</th>
                                    <td><?php echo e($serviceProvider->alt_ph); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo e($serviceProvider->email); ?></td>
                                </tr>
                                <tr>
                                    <th>Mailing Address</th>
                                    <td>
                                        <?= $serviceProvider->mailing_add ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Photographs</th>
                                    <?php $passport = $serviceProvider->passport; ?>
                                    <td class="logoWrap"><img src="<?php echo e($passport); ?>" class="logoImg" alt="" title=""></td>
                                </tr>

                                <tr>
                                    <th>NID No.</th>
                                    
                                    <td class="logoWrap"><?php echo e($serviceProvider->smart_card); ?></td>
                                </tr>
                                <tr>
                                    <th>TIN certificate or trade license: *</th>
                                    <?php $tin = $serviceProvider->tin_cer; ?>
                                    <td class="logoWrap"><img src="<?php echo e($tin); ?>" class="logoImg" alt="" title=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img style="height:150px" src="<?php echo e($serviceProvider->nic_front); ?>" alt="NIC FRONT"
                                    class="img-responsive">
                            </div>
                            <div class="card-body">
                                <img style="height:150px" src="<?php echo e($serviceProvider->nic_front); ?>" alt="NIC FRONT"
                                    class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
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
                <header>
                    <h4>Zone and Cluster</h4>
                </header>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead>
                                <th>Cluster</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $serviceProvider->cluster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cluster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($cluster->clusters->first()->name); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead>
                                <th>Zone</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $serviceProvider->zone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($zone->zones->first()->name); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div>

                <header>
                    <h4>Registered Services</h4>
                </header>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead>
                                <th>Category</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $serviceProvider->Category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category->category()->first()->name); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                

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
                        <td>
                            <?= $serviceProvider->mobile_banking ?>
                        </td>
                    </tr>


                    <tr>
                        <th>MFS Account Number </th>
                        <td><?php echo e($serviceProvider->mfs_account); ?></td>
                    </tr>



                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if($serviceProvider->type != 4): ?>
<div class="col-md-12">
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Comrade Information
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <?php $__currentLoopData = $serviceProvider->comrads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <table class="table table-bordered table-striped table-condensed flip-content">
                <tbody>
                    <tr style="background-color:#ddd">
                        <th>Name</th>
                        <td>
                            <?= $comrad->c_name ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Phone No</th>
                        <td>
                            <?= $comrad->c_phone_no ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Alt Phone No</th>
                        <td>
                            <?= $comrad->c_alt_phone_no ?>
                        </td>
                    </tr>



                    <tr>
                        <th>Nic Front</th>
                        <?php $nic_front_com = $comrad->c_nic_front; ?>

                        <td class="logoWrap"><img src="<?php echo e($nic_front_com); ?>" class="logoImg" alt="Nic back"></td>
                    </tr>
                    <tr>
                        <th>Nic Back</th>
                        <?php $nic_back_com = $comrad->c_nic_back; ?>

                        <td class="logoWrap"><img src="<?php echo e($nic_back_com); ?>" class="logoImg" alt="Nic back"></td>
                    </tr>
                    <tr>
                        <th>Passport</th>

                        <?php $nic_passport = $comrad->c_passport; ?>

                        <td class="logoWrap"><img src="<?php echo e($nic_passport); ?>" class="logoImg" alt="Nic back"></td>
                    </tr>

                </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php endif; ?>
</div>
</div>
<style>
    .logoImg {
        width: 100px
    }

</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.faq.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>