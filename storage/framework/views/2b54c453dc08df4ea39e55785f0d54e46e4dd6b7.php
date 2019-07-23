<ul class="list-group list-group-flush pt-2">
    <input type="text" value="<?php echo e($service_id); ?>" id="service_id" name="service_id" hidden>
    <?php if($SubServicesSelected): ?>
    <?php $__currentLoopData = $SubServicesSelected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list-group-item">
        <div class="row">
            <div class="mb-0 col-md-8">
                
                <label for=""><?php echo e($SubType->service_details_name); ?></label>
            </div>
            <div id="qtyCont" class="col-md-4" style="display:block">
                <div class="input-group input-group-sm">
                    <span style="cursor :pointer"
                        class="bg-primary pl-3 pr-3 pt-1 pb-0 text-white rounded-left mr-0 decrease"
                        data-id="<?php echo e($SubType->sub_cat_details_id); ?>">
                        <i class="fa fa-minus"></i></span>

                    <span class="mr-0 ">
                        <input type="text" value="1" style="width:35px" class="pb-1 text-center " name="qty"
                            placeholder="Qty" id="qty<?php echo e($SubType->sub_cat_details_id); ?>">
                    </span>

                    <span style="cursor :pointer"
                        class="bg-primary pl-3 pr-3 pt-1 pb-0 text-white mr-0 rounded-right increase"
                        data-id="<?php echo e($SubType->sub_cat_details_id); ?>"><i class="fa fa-plus"></i>
                    </span>

                    <span style="cursor :pointer"
                        class="bg-danger ml-3 p-1 text-white mr-0 rounded "
                        data-id="<?php echo e($SubType->sub_cat_details_id); ?>"><i class="fa fa-times"></i>
                    </span>
                </div>
            </div>
        </div>
    </li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul>

<script>
    $('.serviceType').click(function(){
        $id = $(this).val();
        $service_id = $('#service_id').val();
        $qty = $('#qty'+$id).val();
        if($(this).is(':checked')){
            $('#qtyCont-'+$id).show();
            addSubServices($service_id,$id , $qty);
        }else{
            $('#qtyCont-'+$id).hide();
            delSubServices($service_id,$id , $qty);
        }
    });

    function addSubServices(service_id,id,qty){
        $.ajax({
            url: "<?php echo e(route('add.sub-service')); ?>",
            type: 'post',
            data: {"_token": "<?php echo e(csrf_token()); ?>", "service_id": service_id, "id": id , "qty": qty},
            dataType: 'html',
            success: function (response) {
                if(response == 'done'){
                    $('#addRemove'+id).html('ADD');
                }else{
                    $('.grand_total').text(response);
                }
            }
        });
    }

    function delSubServices(service_id,id,qty){
        $.ajax({
            url: "<?php echo e(route('delete.sub-service')); ?>",
            type: 'post',
            data: {"_token": "<?php echo e(csrf_token()); ?>", "service_id": service_id, "id": id , "qty": qty},
            dataType: 'html',
            success: function (response) {
                if(response == 'done'){
                    $('#addRemove'+id).html('ADD');
                }else{
                    $('.grand_total').text(response);
                }
            }
        });
    }

    function qtyUpdate(id,qty){
        $service_id = $('#service_id').val();
        $.ajax({
            url: "<?php echo e(route('update.qty')); ?>",
            type: 'post',
            data: {"_token": "<?php echo e(csrf_token()); ?>", "service_id": $service_id,  "id": id , "qty": qty},
            dataType: 'html',
            success: function (response) {
                // if(!isNaN(response)){
                    $('.grand_total').text(response);
                // }else{
                //     addSubServices($id , $qty);
                // }
            }
        });
    }

    

    $(".decrease").click(function(){
        $id = $(this).data('id');
        $qty = $('#qty'+$id).val();
        if($qty != 1){
            $qty--;
        }
        $('#qty'+$id).val($qty);

        qtyUpdate($id,$qty);
    });

    $(".increase").click(function(){
        $id = $(this).data('id');
        $qty = $('#qty'+$id).val();
        $qty++;
        $('#qty'+$id).val($qty);

        qtyUpdate($id,$qty);
    });
</script>