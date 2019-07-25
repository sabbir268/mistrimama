 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>">
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('topbar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('sidebar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>

<section class="box-typical steps-icon-block">
    <div class="steps-icon-progress">
        <ul style="margin-left: -11.7656px; margin-right: -11.7656px;">
            <li class="active">
                <div class="icon">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Area & Category</div>
            </li>
            <li class="active">
                <div class="icon">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li>
                <div class="icon">
                    <i class="font-icon font-icon-card"></i>
                </div>
                <div class="caption">Date & Time</div>
            </li>
            <li>
                <div class="icon">
                    <i class="font-icon font-icon-check-bird"></i>
                </div>
                <div class="caption">Confirmation</div>
            </li>
        </ul>
    </div>

    <header class="steps-numeric-title">All Services</header>
    <section class="bg-white rounde ">
        <header class="pb-2">Total: <span id="grand_total">000</span>৳</header>
        <div class="col-md-10 offset-md-1" style="height:300px;overflow-y: scroll;">
            <?php $__currentLoopData = $Sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(route('servicec_store')); ?>" class="step1Form" method="post" data-category-id="<?php echo e($data->id); ?>" data-base-price="<?php echo e($data->price); ?>"
                data-additional-price="<?php echo e($data->additional_price); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="ID" value="<?php echo e($data->id); ?>">
                <section class="card mb-0">
                    <header class="card-block ml-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row pt-0 pm-0">
                                    <h5 class="mb-0 border-bottom"><?php echo e($data->name); ?></h5>
                                </div>
                                <div class="row mb-0">
                                    <p class="m-0">
                                        <span>Price: ৳
                                                <span><?php echo e($data->price); ?></span>
                                        </span>|
                                        <span>Additional Price: ৳
                                                    <span><?php echo e($data->additional_price); ?></span>
                                        </span>|
                                        <span>Unit Remark:
                                                    <span><?php echo e($data->unit_remark); ?></span>
                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-sm btn-danger mr-0 col-md-1" id="decrease-<?php echo e($data->id); ?>" onclick="decreaseQuantity(this, <?php echo e($data->id); ?>)"
                                            data-base-price="<?php echo e($data->price); ?>" data-additional-price="<?php echo e($data->additional_price); ?>"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="text" value="1" class="btn btn-sm bg-white rounded-0 text-center mr-0 ml-0 col-md-1" name="qty" placeholder="Qty"
                                        id="increment<?php echo e($data->id); ?>">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success ml-0" id="increase-<?php echo e($data->id); ?>" onclick="increaseQuantity(this, <?php echo e($data->id); ?>)"
                                            data-base-price="<?php echo e($data->price); ?>" data-additional-price="<?php echo e($data->additional_price); ?>"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm  pull-right" id="<?php echo e($data->id); ?>" data-cat-id="<?php echo e($data->id); ?>">ADD</button>
                            </div>
                        </div>
                    </header>
                </section>
            </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <button type="button" class="btn btn-rounded btn-grey float-left"> <a href="<?php echo e(route('book-self')); ?>">← Back</a></button>
    <button type="submit" class="btn btn-rounded float-right"> <a href="<?php echo e(route('date-time')); ?>"> Next →</a></button>

</section>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>

<script type="text/javascript">
    $('.step1Form').on('submit', function (event) {
        event.preventDefault();
        let element = $(this);
        let categoryID = $(this).attr('data-category-id'),
            textFieldId = "increment" + categoryID,
            qtyVal = $('#' + textFieldId).val(),
            fulQty = qtyVal;

        $('#' + textFieldId).val(fulQty);

        let base_price = parseInt(element.attr('data-base-price'));
        let additional_price = parseInt(element.attr('data-additional-price'));
        if (isNaN(additional_price)) {additional_price = 0;}
        let extras = 0;
        if (qtyVal >= 1) {
            extras = qtyVal -1;
        }
        
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: 'html',
            data: $(this).serialize(),

            success: function (response) {
                var res = JSON.parse(response);
                var ids = res['id'];
                var tPrice = res['tPrice'];
                console.log(ids);
                console.log(tPrice);
                $('#' + ids).text("ADDED");
                $('#grand_total').text(tPrice);
            }
        });

        return false;
    });

</script>

<script>
    function increaseQuantity(element, categoryID) {
        element = $(element);
        var textFieldId = "increment" + categoryID;
        var qtyVal = $('#' + textFieldId).val();
        var fulQty = ++qtyVal;
        $('#' + textFieldId).val(fulQty);

        let base_price = parseInt(element.attr('data-base-price'));
        let additional_price = parseInt(element.attr('data-additional-price'));
        if (isNaN(additional_price)) {additional_price = 0;}
        let extras = 0;
        if (qtyVal >= 1) {
            extras = qtyVal -1;
        }
        var grand_total = base_price + (additional_price * extras);
        console.log({
            "first_price": element.attr('data-additional-price'),
            grand_total, base_price, additional_price, extras
        });
        $('#grand_total').text(grand_total);
        var urls = "Booking/justQtySave/" + categoryID + "/" + fulQty;
        $.ajax({
            url: urls,
            type: 'get',
            dataType: 'html',
            success: function (response) {

            }
        });
    }

    function decreaseQuantity(element, categoryID) {
        element = $(element);
        var textFieldId = "increment" + categoryID;
        var qtyVal = $('#' + textFieldId).val();
        var fulQty = --qtyVal;
        $('#' + textFieldId).val(fulQty);
        let base_price = parseInt(element.attr('data-base-price'));
        let additional_price = parseInt(element.attr('data-additional-price'));
        if (isNaN(additional_price)) {additional_price = 0;}
        let extras = 0;
        if (qtyVal >= 1) {
            extras = qtyVal -1;
        }
        var grand_total = base_price + (additional_price * extras);
        console.log({
            "first_price": element.attr('data-additional-price'),
            grand_total, base_price, additional_price, extras
        });
        $('#grand_total').text(grand_total);
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>