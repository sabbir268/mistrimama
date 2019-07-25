<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service Option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <input type="text" value="<?php echo e($service_id); ?>" id="pservice_id" name="service_id" hidden>
                            <?php if($SubServicesType): ?>
                            <?php $__currentLoopData = $SubServicesType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="checkbox-bird green mb-0 col-md-8">
                                        <input type="checkbox" class="serviceType" value="<?php echo e($SubType->id); ?>"
                                            id="check-bird-<?php echo e($SubType->id); ?>">
                                        <label for="check-bird-<?php echo e($SubType->id); ?>"><?php echo e($SubType->name); ?></label>
                                    </div>
                                    <div id="qtyCont-<?php echo e($SubType->id); ?>" class="col-md-4" style="display:none">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text decrease" style="cursor :pointer"
                                                    data-id="<?php echo e($SubType->id); ?>" id="inputGroup-sizing-sm"><i
                                                        class="fa fa-minus"></i></span>
                                            </div>
                                            <input type="text" class="form-control text-center" aria-label="Small"
                                                aria-describedby="inputGroup-sizing-sm" placeholder="Qty"
                                                id="qty<?php echo e($SubType->id); ?>" value="1">
                                            <div class="input-group-append ">
                                                <span class="input-group-text increase" style="cursor :pointer"
                                                    data-id="<?php echo e($SubType->id); ?>" id="inputGroup-sizing-sm"><i
                                                        class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <ul class="remarks">
                        </ul>

                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-info ml-5">Approx. Price:<span class="sub_total">0</span></button>
                        <button type="button" class="btn btn-secondary" id="nextOpt" data-dismiss="modal">Next
                            →</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    jQuery('.serviceType').click(function() {
        $id = jQuery(this).val();
        $service_id = jQuery('#pservice_id').val();
        $qty = jQuery('#qty' + $id).val();
        if (jQuery(this).is(':checked')) {
            jQuery('#qtyCont-' + $id).show();
            addSubServices($service_id, $id, $qty);
        } else {
            jQuery('#qtyCont-' + $id).hide();
            delSubServices($service_id, $id, $qty);
        }
    });

    function addSubServices(service_id, id, qty) {
        jQuery.ajax({
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
                    jQuery('#addRemove' + id).html('ADD');
                } else {
                    var data = JSON.parse(response);
                    jQuery('.sub_total').html(data.total_price);
                    // var rm = data.unit_remarks
                    // for(var i = 0; i < rm.length; i++){
                    //     var remarks = '<li>'+rm[i]+'</li>';
                    // }
                    jQuery('.remarks').html('<li>'+data.unit_remarks+'</li>');
                }
            }
        });
    }

    function delSubServices(service_id, id, qty) {
        jQuery.ajax({
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
                    jQuery('#addRemove' + id).html('ADD');
                } else {
                    jQuery('.grand_total').html(response);
                }
            }
        });
    }

    function qtyUpdate(id, qty) {
        $service_id = jQuery('#pservice_id').val();
        jQuery.ajax({
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
                    var data = JSON.parse(response);
                    jQuery('.sub_total').text(data.total_price);
                    jQuery('.remarks').html('<li>'+data.unit_remarks+'</li>');
                // }else{
                //     addSubServices($id , $qty);
                // }
            }
        });
    }



    jQuery(".decrease").click(function() {
        $id = jQuery(this).data('id');
        $qty = jQuery('#qty' + $id).val();
        if ($qty != 1) {
            $qty--;
        }
        jQuery('#qty' + $id).val($qty);

        qtyUpdate($id, $qty);
    });

    jQuery(".increase").click(function() {
        $id = jQuery(this).data('id');
        $qty = jQuery('#qty' + $id).val();
        $qty++;
        jQuery('#qty' + $id).val($qty);

        qtyUpdate($id, $qty);
    });

    jQuery('#nextOpt').click(function() {
        $service_id = jQuery('#pservice_id').val();
        jQuery.ajax({
            url: "<?php echo e(route('selected.sub-service')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "service_id": $service_id
            },
            dataType: 'html',
            success: function(response) {
                jQuery('#addRemove' + $service_id).html('ADDED');
                jQuery('#addRemove' + $service_id).removeClass('bg-success');
                jQuery('#addRemove' + $service_id).addClass('bg-info');
                jQuery('#collapsePanel' + $service_id).html(response);
                jQuery('#collapsePanel' + $service_id).show();
            }
        });
    });
</script>