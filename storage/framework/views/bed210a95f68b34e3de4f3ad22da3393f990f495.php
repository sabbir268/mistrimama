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
            <li class="active">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Review</div>
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

    
    <section class="bg-white rounde  ">
        <header class="col-md-10 offset-md-1 card-header bg-light">
            <div class="row">
                <div class="col-md-6">
                    <span class="float-left"><b>Selected Services</b></span>
                </div>
                <div class="col-md-6">
                    <span class="float-right">Total: <span class="grand_total"
                            id="grand_total"><?php echo e($totalPrice); ?></span>৳</span>
                </div>
            </div>
        </header>
        <div class="col-md-10 offset-md-1 p-1 border" style="height:280px;overflow-y: scroll;">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>সার্ভিস</th>
                        <th>ইউনিট চার্জ</th>
                        <th>অতিঃ ইউনিট চার্জ</th>
                        <th>পরিমান</th>
                        <th>মোট</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $addedService; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-left">
                            <?php echo e($booking->service_name); ?>(<?php echo e($booking->service_details_name); ?>)</td>
                        <td>
                            

                                <?php echo e($booking->price); ?>

                        </td>
                        <td>
                            
                                <?php echo e($booking->quantity > 1 ? $booking->aditional_price : 0); ?>

                        </td>
                        <td>
                            
                                <?php echo e($booking->quantity); ?>

                        </td>
                        <td>
                            <input min="30" data-id="<?php echo e($booking->id); ?>" type="text" style="width:90%"
                                class="text-center form-control form-control-sm total_price"
                                value="<?php echo e($booking->total_price); ?>" id="">
                                <span style="display:none" class="text-danger alert-<?php echo e($booking->id); ?>">Minimum price shoulbe BDT 30/-</span>
                        </td>
                        
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

                <tfoot>
                </tfoot>
            </table>
        </div>
    </section>

    
    <button type="button" id="dateTime" class="btn btn-rounded float-right btn-mm"> <a href="#" class="text-white"> Next
            →</a></button>

</section>


<div id="showModal">

</div>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>

<script>
    $('.total_price').keyup(function(){
        $id  = $(this).data('id');
        $price = $(this).val();
        if($price < 30){
            $('.alert-'+$id).show();
        }else{
            $('.alert-'+$id).hide();
        }
        $.ajax({
            url: "<?php echo e(route('service.price.change')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "id": $id,
                "price": $price
            },
            dataType: 'html',
            success: function(response) {
              console.log(response);
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