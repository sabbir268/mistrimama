<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/profile.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('comrade.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('comrade.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if($allowcatedOrders): ?>
<section class="box-typical box-typical-dashboard panel panel-default scrollable">
    <header class="box-typical-header panel-heading pt-2 pb-2 text-center">
        <h3 class="panel-header m-0">বন্টন কৃত সার্ভিস </h3>
    </header>
    <?php $__currentLoopData = $allowcatedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-md-12">
            
            
            <div class="row">
                <div class="col-lg-4 col-lg-pull-6 col-md-3 col-sm-6 pl-5 pt-3">
                    <section class="box-typical">
                        <div class="card-header text-center">
                            অর্ডার #<?php echo e($allord->order_no); ?>

                        </div>
                        <div class="profile-card">
                            <div class="profile-card-photo">
                                <img style="width: 100% !important;height: 100px;" src="
                                    <?php if($allord->type == 'self'): ?>
                                     <?php echo e($allord->user->photo != null ? $allord->user->photo : asset('/dashboard/img/avatar-1-256.png')); ?>

                                     <?php else: ?> 
                                     <?php echo e(asset('/dashboard/img/avatar-1-256.png')); ?>

                                     <?php endif; ?>
                                     " alt="" />
                            </div>
                            <div class="profile-card-name"><strong><i class="fa fa-user text-secondary"></i></strong>
                                <?php echo e($allord->name); ?></div>
                            
                            <div class="profile-card-status "><strong><i class="fa fa-map text-secondary"></i></strong>
                                <?php echo e($allord->address); ?></div>
                            <div class="profile-card-status "><strong><i class="fa fa-phone text-secondary"></i></strong>
                                   <a class="text-dark" href="tel:<?php echo e($allord->phone); ?>"><?php echo e($allord->phone); ?></a></div>

                            
                        </div>
                        <!--.profile-card-->

                        <div class="profile-statistic tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <b>0</b>
                                    সার্ভিস নিয়েছে
                                </div>
                                <div class="tbl-cell">
                                    <b>5 <i class="font-icon font-icon-star text-secondary"></i> </b>
                                    গড় রেটিং
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--.box-typical-->
                </div>
                <!--.col- -->
                <div class="col-md-8">
                    <section class="box-typical-section">
                        <div class="col-md-12 p-0 pb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-mm btn-sm col-md-12 new_service" id="new_service"
                                        data-order_id="<?php echo e($allord->id); ?>"
                                        data-category_id="<?php echo e($allord->category_id); ?>">নতুন সার্ভিস যোগ করুন
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo e(route('comrade.cancel-order',$allord->id)); ?>"
                                        class="btn btn-danger btn-sm col-md-12">অর্ডার বাতিল করুন</a>
                                </div>

                            </div>
                        </div>
                        <div class="card mb-3" style="height: 250px;overflow: auto;">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>সার্ভিস</th>
                                        <th class="text-center">প্রথম<span class="invisible">s</span>ইউনিট-এর মূল্য</th>
                                        <th>অতিরিক্ত<span class="invisible">s</span>ইউনিট-এর মূল্য</th>
                                        <th>পরিমান</th>
                                        <th>মোট </th>
                                        <th class="text-center">একশন </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $allord->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <?php echo e($booking->service_name); ?>(<?php echo e($booking->service_details_name); ?>)</td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->quantity > 1 ? $booking->aditional_price : 0); ?></td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text btn-mm decrease"
                                                        style="cursor :pointer" data-id="<?php echo e($booking->id); ?>"
                                                        data-order_id="<?php echo e($booking->order_id); ?>"
                                                        id="inputGroup-sizing-sm"><i class="fa fa-minus"></i></span>
                                                </div>
                                                <input type="text" class="form-control text-center p-0 m-0"
                                                    aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                                                    placeholder="Qty" id="qty<?php echo e($booking->id); ?>"
                                                    value="<?php echo e($booking->quantity); ?>">
                                                <div class="input-group-append ">
                                                    <span class="input-group-text btn-mm text increase"
                                                        style="cursor :pointer" data-id="<?php echo e($booking->id); ?>"
                                                        data-order_id="<?php echo e($booking->order_id); ?>"
                                                        id="inputGroup-sizing-sm"><i class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo e($booking->total_price); ?>

                                        </td>
                                        <td>
                                            <?php if($allord->status > 1): ?>
                                            <button class="btn btn-rounded btn-sm
                                            <?php if($booking->status == 0): ?>
                                                 btn-success-outline
                                            <?php endif; ?>
                                               finsih_sub" data-id="<?php echo e($booking->id); ?>"
                                                id="finsih_sub<?php echo e($booking->id); ?>"><i class="fa fa-thumbs-up"></i>
                                                <?php if($booking->status == 0): ?>
                                                শেষ
                                                <?php else: ?>
                                                কাজ শেষ
                                                <?php endif; ?>

                                            </button>
                                            <?php else: ?>
                                            -
                                            <?php endif; ?>

                                            <?php if(count($allord->bookings) > 1): ?>
                                            <a href="<?php echo e(url('comrade/remove-sub')); ?>/<?php echo e($booking->id); ?>"
                                                class="btn btn-sm btn-danger "><i class="fa fa-times"></i></a>
                                            <?php else: ?>
                                            -
                                            <?php endif; ?>

                                        </td>


                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                                <tfoot>
                                </tfoot>
                            </table>

                        </div>
                        <div class="col-md-12 p-0 pb-2">
                            <?php if($allord): ?>
                            <form action="<?php echo e(route('service-update-sts')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <!-- -->
                                <input type="text" value="<?php echo e($allord->id); ?>" name="order_id" hidden>
                                <input type="text" value="<?php echo e($allord->serviceSystem->id); ?>" name="s_sys_id" hidden>
                                <?php switch($allord->status):
                                case (1): ?>
                                <input type="text" value="2" name="status" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">কাজ শুরু করুন
                                </button> <?php break; ?>
                                <?php case (2): ?>
                                <input type="text" value="3" name="status" hidden>
                                <?php if(in_array("1",$allord->bookings->pluck('status')->toArray())): ?>
                                <button type="submit" class="btn  btn-success" style="width:100%">কাজ সম্পন্ন করুন
                                </button>
                                <?php endif; ?>
                                <?php break; ?>
                                <?php case (3): ?>
                                
                                <input type="text" value="5" name="status" hidden>
                                <input type="text"
                                    value="<?php echo e((($allord->total_price + $allord->extra_price) - $allord->disc)); ?>"
                                    name="amount" hidden>
                                <input type="text" value="<?php echo e($allord->sp_id); ?>" name="service_provider_id"
                                    hidden>
                                <input type="text" value="<?php echo e($allord->user_id); ?>" name="client_id" hidden>

                                <ul class="list-group mb-2">
                                    <li class="list-group-item p-0 m-0 border-0 "> সার্ভিস চার্জ : <span
                                            class="invisible">123assass2</span>
                                        <strong><?php echo e(($allord->total_price + $allord->extra_price)); ?>

                                            টাকা </strong></li>
                                    <?php if($allord->disc != 0.00): ?>
                                    <li class="list-group-item p-0 m-0 border-0 "> কাস্টমারের ডিসকাউন্ট :
                                        <strong><?php echo e($allord->disc); ?> টাকা</strong></li>
                                    <?php endif; ?>
                                    <li class="list-group-item p-0 m-0"></li>
                                    <li class="list-group-item p-0 m-0 border-0 "> আপনার ইনকাম : <span
                                            class="invisible">123s2</span>
                                        <strong><?php echo e((($allord->total_price + $allord->extra_price) - $allord->disc)); ?> টাকা</strong>
                                    </li>
                                </ul>

                                
                                <button type="submit" class="btn  btn-success" style="width:100%">পেমেন্ট গ্রহন করুন
                                </button>
                                
                                <?php break; ?>
                                <?php case (4): ?>
                                <ul class="list-group mb-2">
                                    <li class="list-group-item p-0 m-0 border-0 ">কাস্টমার প্রদান করছেন : <span
                                            class="invisible">1232</span>
                                        <strong><?php echo e((($allord->total_price + $allord->extra_price) - $allord->disc)); ?>

                                            টাকা </strong></li>
                                    <li class="list-group-item p-0 m-0 border-0 "> কাস্টমারের ডিসকাউন্ট :
                                        <strong><?php echo e($allord->disc); ?> টাকা</strong></li>
                                    <li class="list-group-item p-0 m-0"></li>
                                    <li class="list-group-item p-0 m-0 border-0 "> আপনার ইনকাম : <span
                                            class="invisible">123s2</span>
                                        <strong><?php echo e((($allord->total_price + $allord->extra_price) )); ?> টাকা</strong>
                                    </li>
                                </ul>
                                <input type="text" value="5" name="status" hidden>
                                <input type="text"
                                    value="<?php echo e((($allord->total_price + $allord->extra_price) - $allord->disc)); ?>"
                                    name="amount" hidden>
                                <input type="text" value="<?php echo e($allord->sp_id); ?>" name="service_provider_id"
                                    hidden>
                                <input type="text" value="<?php echo e($allord->user_id); ?>" name="client_id" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">পেমেন্ট গ্রহন করুন
                                </button>
                                <?php break; ?>
                                <?php default: ?>
                                <input type="text" value="" name="status" hidden> <?php endswitch; ?>
                            </form>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php else: ?>
<section>
    <header class="box-typical-header panel-heading pt-2 pb-2 text-center">
        <h3 class="panel-header m-0">এই মূহুর্তে কোনো সার্ভিস বরাদ্দ নেই।</h3>
    </header>
</section>
<?php endif; ?>

<div id="showModal"></div>
<div id="showModal2"></div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>
    $(document).ready(function() {

        $('.finsih_sub').click(function(){
            $id = $(this).data('id');
            // console.log($id);
            // console.log("<?php echo e(asset('/order-bit-done/')); ?>/"+$id);
            $.ajax({
                    type: "get",
                    url: "<?php echo e(asset('/order-bit-done/')); ?>/"+$id,
                    dataType: "html",
                    success: function (response) {
                        if(response == 1){
                            $("#finsih_sub"+$id).removeClass('btn-primary-outline');
                            $("#finsih_sub"+$id).addClass('btn-success-outline');
                            $("#finsih_sub"+$id).find('i.fa').toggleClass('fa-user fa-thumbs-up');
                            $("#finsih_sub"+$id).text('কাজ শেষ');

                            location.reload();
                        }
                    }
                });
            
        });

        // $('#cancel_order').submit(function(e){
        //     e.preventDefault();
        //     $confirm = confirm("Sure to cancel this order?")
            
        //     if($confirm){
        //         $('#cancel_order').submit();
        //     }else{
        //         location.reload();
        //     }

        // });

        function qtyUpdate(id,qty,order_id) {
        //$service_id = $('#pservice_id').val();
        $.ajax({
            url: "<?php echo e(route('update.qty.comrade')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "id": id,
                "qty": qty,
                "order_id": order_id
            },
            dataType: 'html',
            success: function(response) {
                // // if(!isNaN(response)){
                //     var data = JSON.parse(response);
                //     $('.sub_total').text(data.total_price);
                //     $up = parseInt($('#unit_point').html());
            
                //     $upp = qty * parseInt(data.unit_point_adtnl);
                //     $('#unit_point').html('');
                //     $('#unit_point').html($upp);
                // // }else{
                // //     addSubServices($id , $qty);
                // // }
                console.log(response);
            }
        });
    }

        $(".decrease").click(function() {
            $id = $(this).data('id');
            $qty = $('#qty' + $id).val();
            if ($qty != 1) {
                $qty--;
            }
            $('#qty' + $id).val($qty);

            $order_id = $(this).data('order_id');
           qtyUpdate($id, $qty,$order_id);
        });

        $(".increase").click(function() {
            $id = $(this).data('id');
            $qty = $('#qty' + $id).val();
            $qty++;
            $('#qty' + $id).val($qty);

            $order_id = $(this).data('order_id');
             qtyUpdate($id, $qty,$order_id);
        });



        $('.new_service').click(function(){
            $category_id = $(this).data('category_id');
            $order_id = $(this).data('order_id');
            $.ajax({
                    type: "get",
                    url: "<?php echo e(asset('/new_service/')); ?>/"+$category_id+"/"+$order_id,
                    dataType: "html",
                    success: function (response) {
                        $('#showModal').html(response);
                        $('#all_services').modal({
                            show: true,
                            backdrop: 'static',
                            keyboard: false
                        });
                    }
                });
        })



        
      });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>