<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="box-typical steps-icon-block">
    <div class="steps-icon-progress">
        <ul style="margin-left: -11.7656px; margin-right: -11.7656px;">
            <li class="active">
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Category</div>
            </li>
            <li class="active">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li>
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-card"></i>
                </div>
                <div class="caption">Date & Time</div>
            </li>
            <li>
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-check-bird"></i>
                </div>
                <div class="caption">Confirmation</div>
            </li>
        </ul>
    </div>

    <header class="steps-numeric-title">All Services</header>
    <section class="bg-white rounde  ">
        <header class="col-md-10 offset-md-1 card-header bg-light">Total: <span class="grand_total" id="grand_total">0.00</span>৳</header>
        <div class="col-md-10 offset-md-1 p-1 border" style="height:280px;overflow-y: scroll;">
            <?php $__currentLoopData = $Sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo csrf_field(); ?>
            <div class="card mb-1 pl-3">
                <div class="card-body ">
                    <input type="hidden" name="ID" value="<?php echo e($data->id); ?>">
                    <div class="row">
                        <div class="col-md-8">
                            <div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse" data-target="#collapsePanel<?php echo e($data->id); ?>" aria-expanded="false" aria-controls="collapseExample">
                                <h5 class="mb-0"> <span class="rounded-circle  text-mm  "><i class="fa fa-cube"></i></span> <?php echo e($data->name); ?></h5>
                            </div>
                        </div>
                        <div class="col-md-4 text-center pt-2">
                            
                            <span style="cursor :pointer" class="bg-mm pl-3 pr-3 pt-1 pb-1 text-white ml-3 rounded addRemove" data-id="<?php echo e($data->id); ?>" id="addRemove<?php echo e($data->id); ?>">ADD</span>
                        </div>
                    </div>

                    <div class="row collapse mb-0 text-left" id="collapsePanel<?php echo e($data->id); ?>">
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <button type="button" class="btn btn-rounded float-left btn-mm "> <a href="<?php echo e(route('book-self')); ?>" class="text-white">←
    Back</a></button> 
    <button type="button" id="dateTime" class="btn btn-rounded float-right btn-mm"> <a href="#" class="text-white"> Next →</a></button>

</section>


<div id="showModal">

</div>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>

<script>
    $('.addRemove').click(function() {
        $id = $(this).data('id');
        $.ajax({
            url: "<?php echo e(route('add.sub-service-details')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "id": $id
            },
            dataType: 'html',
            success: function(response) {
                $('#showModal').html(response);
                $('#exampleModal').modal({
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                    });
                
            }
        });
    });

    $('#dateTime').click(function() {
        if($('#grand_total').html() == '0.00' || $('#grand_total').html() == '' || $('#grand_total').html() == '0'){
            alert('Select service first!');
        }else{
            window.location.href = "<?php echo e(route('date.time')); ?>";
        }
    });

    

    // window.onbeforeunload = function(event)
    // {
    //     return confirm("Confirm refresh");
    // }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>