<?php $__env->startSection('content'); ?>
<div class="page-content">
  <!-- inner page banner -->
  <!-- Breadcrumb  Templates Start -->

  <div class="breadcrumb-row">
    <div class="container">
      <ul class="list-inline">
        
      </ul>
    </div>
  </div>
  <!-- Breadcrumb  Templates End -->
  <!-- Left & right section start -->

  <div class="section-content profiles-content">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <div class="col-md-12">
            <center> <h2>All Services</h2></center>
            <div class="form-group">
                <section class="rounde  ">
                    <div class="card-header">
                    <center><h5>Total: <span class="grand_total" id="grand_total">0.00</span>৳</h5></center>
                </div>
                <?php $__currentLoopData = $Sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-1">
                    <div class="card-body ">
                        <input type="hidden" name="ID" value="<?php echo e($data->id); ?>">
                        <div class="row">
                            <div class="col-md-8">
                                <div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse" data-target="#collapsePanel<?php echo e($data->id); ?>" aria-expanded="false" aria-controls="collapseExample">
                                    <h5 class="mb-0"> <span class=" rounded-circle "><i class="fa fa-chevron-down"></i></span> <?php echo e($data->name); ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4 text-center pt-2">
                                <span style="cursor :pointer" class="btn btn-sm btn-primary rounded addRemove" data-id="<?php echo e($data->id); ?>" id="addRemove<?php echo e($data->id); ?>">ADD</span>
                            </div>
                        </div>
    
                        <div class="row collapse mb-0 text-left" id="collapsePanel<?php echo e($data->id); ?>">
                        </div>
                    </div>
                </div>
    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </section>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="button"  value="Previous" class="btn btn-block btn-primary backToStepOne">
            </div>
        </div>
        <div class="col-md-4 pull-right">
            <div class="form-group">                
                <a href="<?php echo e(asset('/third')); ?>" class="btn btn-block btn-primary forwardToThird"> Next</a>
            </div>
        </div>

    </div>
  </div>
    </div>
  </div>
</div>

<div class="response_modal"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


<script type='text/javascript' src='<?php echo e(asset("/new_theme/includes/js/raw.js")); ?>'></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>