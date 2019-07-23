<ul class="list-group list-group-flush pt-2 pl-4 pr-4">
    <input type="text" value="<?php echo e($service_id); ?>" id="service_id" name="service_id" hidden>
    <?php if($SubServicesSelected): ?>
    <?php $__currentLoopData = $SubServicesSelected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list-group-item border-0" id="main-carear-<?php echo e($SubType->sub_cat_details_id); ?>">
        <div class="row">
            <div class="mb-0 col-md-7">
                
                <label for=""><?php echo e($SubType->service_details_name); ?></label>
            </div>
            <div id="qtyCont" class="col-md-5" style="display:block">
                <div class="input-group input-group-sm">
                    <span style="cursor :pointer"
                        class="input-group-text pl-3 pr-3 pt-1 pb-0 btn-mm rounded-0 mr-0 decrease"
                        data-id="<?php echo e($SubType->sub_cat_details_id); ?>" data-service="<?php echo e($service_id); ?>">
                        <i class="fa fa-minus"></i></span>

                    <span class="mr-0 " style="border: 1px solid #f3b400 !important">
                        <input type="text" value="<?php echo e($SubType->quantity); ?>" style="width:35px" class="pb-1 text-dark border-mm text-center border-0" name="qty"
                            placeholder="Qty" id="qty<?php echo e($SubType->sub_cat_details_id); ?>" data-service="<?php echo e($service_id); ?>">
                    </span>

                    <span style="cursor :pointer"
                        class="input-group-text pl-3 pr-3 pt-1 pb-0 btn-mm text-white mr-0 rounded-0 increase"
                        data-id="<?php echo e($SubType->sub_cat_details_id); ?>" data-service="<?php echo e($service_id); ?>"><i class="fa fa-plus"></i>
                    </span>

                    <span style="cursor :pointer" class="bg-danger ml-3 p-1 text-white mr-0 rounded-0 remove-item"
                        data-id="<?php echo e($SubType->sub_cat_details_id); ?>" data-service="<?php echo e($service_id); ?>"><i class="fa fa-times"></i>
                    </span>
                </div>
            </div>
        </div>
    </li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul>

<script>
    $('.serviceType').click(function() {
        $id = $(this).val();
        $service_id = $('#service_id').val();
        $qty = $('#qty' + $id).val();
        if ($(this).is(':checked')) {
            $('#qtyCont-' + $id).show();
            addSubServices($service_id, $id, $qty);
        } else {
            $('#qtyCont-' + $id).hide();
            delSubServices($service_id, $id, $qty);
        }
    });

    function addSubServices(service_id, id, qty) {
        $.ajax({
            url: "<?php echo e(route('add.sub-service')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "service_id": service_id,
                "id": id,
                "qty": qty
            },
            dataType: 'html',
            success: function(response) {
                if (response == 'done') {
                    $('#addRemove' + id).html('ADD');
                } else {
                    $('.grand_total').text(response);
                }
            }
        });
    }

    function delSubServices(service_id, id, qty) {
        $.ajax({
            url: "<?php echo e(route('delete.sub-service')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "service_id": service_id,
                "id": id,
                "qty": qty
            },
            dataType: 'html',
            success: function(response) {
                if (response == 'done') {
                    $('#addRemove' + id).html('ADD');
                } else {
                    $('.grand_total').text(response);
                }
            }
        });
    }

    function qtyUpdate(id, qty) {
        $service_id = $('#service_id').val();
        $.ajax({
            url: "<?php echo e(route('update.qty')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "service_id": $service_id,
                "id": id,
                "qty": qty
            },
            dataType: 'html',
            success: function(response) {
                // if(!isNaN(response)){
                // $('.grand_total').text(response);
                // }else{
                //     addSubServices($id , $qty);
                // }
                $.ajax({
                    url: "<?php echo e(route('order.total_price')); ?>",
                    type: 'get',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>"
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#grand_total').html(response);
                    }
                });
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

        qtyUpdate($id, $qty);
    });

    $(".increase").click(function() {
        $id = $(this).data('id');
        $qty = $('#qty' + $id).val();
        $qty++;
        $('#qty' + $id).val($qty);

        qtyUpdate($id, $qty);
    });

    $(".remove-item").click(function() {
        $id = $(this).data('id');
        $service_id = $(this).data('service');
        
        $qty = $('#qty' + $id).val();

        $.ajax({
            url: "<?php echo e(route('delete.sub-service')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "service_id": $service_id,
                "id": $id,
                "qty": $qty
            },
            dataType: 'html',
            success: function(response) {
                if(response == 0){
                    jQuery('#addRemove' + $service_id).html('ADD');
                    // jQuery('#collapsePanel' + $service_id).html(response);
                    jQuery('#collapsePanel' + $service_id).hide();
                }
                $('#main-carear-'+$id).hide();
                $.ajax({
                    url: "<?php echo e(route('order.total_price')); ?>",
                    type: 'get',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>"
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#grand_total').html(response);
                    }
                });
            }
        });

    });
    
</script>