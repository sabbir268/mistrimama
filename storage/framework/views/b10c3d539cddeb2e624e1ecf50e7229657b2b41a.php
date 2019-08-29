<?php if($SubCategory): ?>
<div class="modal fade" id="all_services" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Serivces</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12" style="height:280px;overflow-y: scroll;">
                    <?php $__currentLoopData = $SubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-1 pl-3">
                        <div class="card-body ">
                            <input type="hidden" name="ID" value="<?php echo e($data->id); ?>">
                            <div class="row">
                                <div class="col-md-8">
                                    <div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse"
                                        data-target="#collapsePanel<?php echo e($data->id); ?>" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <h5 class="mb-0"> <span class="rounded-circle  text-mm  "><i
                                                    class="fa fa-cube"></i></span>
                                            <?php echo e($data->name); ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center pt-2">
                                    <span style="cursor :pointer"
                                        class="bg-mm pl-3 pr-3 pt-1 pb-1 text-white ml-3 rounded addRemove"
                                        data-id="<?php echo e($data->id); ?>" id="addRemove<?php echo e($data->id); ?>">ADD</span>
                                </div>
                            </div>
                            <div class="row collapse mb-0 text-left" id="collapsePanel<?php echo e($data->id); ?>">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" id="new_service_add_done" data-dismiss="modal">Done</button>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    $('.addRemove').click(function() {
            $id = $(this).data('id');
            $order_id = <?php echo e($order_id); ?>;
            $.ajax({
                url: "<?php echo e(route('add.sub-service-details')); ?>",
                type: 'post',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": $id,
                    "order_id": $order_id
                },
                dataType: 'html',
                success: function(response) {
                    $('#showModal2').html(response);
                    $('#exampleModal').modal({
                        show: true,
                        backdrop: 'static',
                        keyboard: false
                        });
                    
                }
            });
        });

        $('#new_service_add_done').click(function(){
            location.reload();
        })
</script>
<?php endif; ?>