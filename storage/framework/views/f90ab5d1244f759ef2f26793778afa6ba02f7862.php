<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/clockpicker/bootstrap-clockpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php if(Auth::check()): ?>
<?php echo $__env->make('user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
<?php echo $__env->make('user.topbar-guest', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php if(Auth::check()): ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>

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
                    <i class="font-icon font-icon-calend"></i>
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

    <header class="steps-numeric-title">Date & Time </header>
    <form action="<?php echo e(route('add.date-time')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="col-xl-6 offset-md-3 ">
            <div class="row imergency" style="display:none">
                <div class="alert alert-warning alert-icon alert-close alert-dismissible fade show" role="alert">
                    
                    <i class="font-icon font-icon-warning"></i>
                    <strong>N.B.</strong>For emergency service hour (8:00 pm to 8:00 am) an additional BDT 500 will be
                    added.
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-4">
                    <label class="form-label">
                        <i class="font-icon font-icon-calend"></i>
                        Select Date
                    </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group date">
                        <input type="text" name="order_date" id="order_date" class="form-control"
                            placeholder="Chose Date" required>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-4">
                    <label class="form-label">
                        <i class="font-icon font-icon-speed"></i>
                        Select Time
                    </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group">
                        

                        <input type="text" class="from-control" name="order_time" id="order_time1" style="    display: block;
                        width: 88%;
                        padding: .375rem .75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        color: #495057;
                        background-color: #fff;
                        background-clip: padding-box;
                        border: 1px solid #f3b400;
                        border-radius: .25rem;
                        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                        margin-left: 20px;">

                        <input type="text" class="from-control" name="order_time" id="order_time2" style="  display: none;
                        width: 88%;
                        padding: .375rem .75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        color: #495057;
                        background-color: #fff;
                        background-clip: padding-box;
                        border: 1px solid #f3b400;
                        border-radius: .25rem;
                        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                        margin-left: 20px;">
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-rounded float-right btn-mm">Next →</button>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker-init.js')); ?>"></script>
<script>
    var today = new Date(); 
    var dd = today.getDate(); 
    var dds = today.getDate()+7; 
    var mm = today.getMonth()+1; //January is 0! 
    var yyyy = today.getFullYear(); 
    if(dd<10){ dd='0'+dd } 
    if(mm<10){ mm='0'+mm } 
    // console.log(dd);
    var today = dd+'/'+mm+'/'+yyyy; 
    var weeklet = dds+'/'+mm+'/'+yyyy; 
     
    $('#order_date').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
        // maxDate: weeklet,
        minDate: today,
        locale: {
            format: 'DD/MM/YYYY'
        }
	});

        // function for time picker help
        function getCurrentTime(date) {
                var hours = date.getHours()+1,
                minutes = date.getMinutes(),
                ampm = hours >= 12 ? 'pm' : 'am';

                hours = hours % 12;
                hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = minutes < 10 ? '0'+minutes : minutes;

                return hours + ':' + '00' + ' ' + ampm;
        }

        


       $('#order_date').change(function(){
            if(today != $('#order_date').val()){
                $('#order_time1').hide();
                $('#order_time2').show();
            }else{
                $('#order_time1').show();
                $('#order_time2').hide();
            } 
       });
       


// only time picker
        $('#order_time1').timepicker({
            change: function(time) {
                $time = $(this).val();
                $time = $time.split(" ");
                $num = parseInt($time[0]);
                $met = $time[1];
                if(($num > 8  && $met == 'PM') || ($num < 8 && $met == 'AM')){
                    //alert("In this case we'll charge 500 tk extra for emergency ");
                    $('.imergency').show();
                    if($num == 12  && $met == 'PM'){
                        $('.imergency').hide();
                    }
                }else{
                    $('.imergency').hide();   
                }

                
            },

            timeFormat: 'h:mm p',
            interval: 60,
            minTime: getCurrentTime(new Date()),
            // minTime: '08:00am',
            // maxTime: '12:00pm',
             defaultTime: getCurrentTime(new Date()),
            // startTime: '12:00pm',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });

        $('#order_time2').timepicker({
            change: function(time) {
                $time = $(this).val();
                $time = $time.split(" ");
                $num = parseInt($time[0]);
                $met = $time[1];
                if(($num > 8  && $met == 'PM') || ($num < 8 && $met == 'AM')){
                    //alert("In this case we'll charge 500 tk extra for emergency ");
                    $('.imergency').show();
                    if($num == 12  && $met == 'PM'){
                        $('.imergency').hide();
                    }
                }else{
                    $('.imergency').hide();   
                }

                
            },

            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '08:00am',
            // minTime: '08:00am',
            // maxTime: '12:00pm',
             defaultTime: '08:00am',
            // startTime: '12:00pm',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });


        
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>