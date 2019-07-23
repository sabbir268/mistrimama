<?php $__env->startSection('body'); ?>

<h1 class="page-title">Service Category
    <small></small>
    
</h1>
<div class="row">
    <div class="col-md-12">



        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Service Category</div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
<!--                            <th>Id</th>-->
                            <th>Title</th>
<!--                            <th>Duration</th>-->
                            <th class="align-center action-wraper">Action </th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="category-<?= $model->id ?>" >
<!--                            <td><?php echo e($model->id); ?></td>-->
                            <td><?php echo e($model->name); ?></td>
<!--                            <td><?php echo e($model->servise_duration); ?></td>-->
                            <td  class="align-center">
                                <div class="action-wraper">
                                  
                                    <a class="btn btn-warning btn-xs" title="Edit" href="<?php echo e(route('service-category.edit',$model->id)); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
<!--                                    <?php echo Form::open(['method' => 'DELETE','route' => ['service-category.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]); ?>

                                    <button type="submit" class="btn red btn-xs"><i class="fa fa-trash"></i></button>
                                    <?php echo Form::close(); ?>-->
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <?php echo $models->appends(Input::except('page'))->render(); ?>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
//    $(function () {
//        $("#sortable").sortable();
//        $("#sortable").disableSelection();
//    });

    $('#sortable').sortable({
        axis: 'y',
        stop: function (event, ui) {
            var data = $(this).sortable('serialize');
            $.ajax({
                data: data,
                dataType: 'JSON',
                type: 'GET',
                url: '<?php echo e(route("position-update")); ?>',
                beforeSend: function () {
                    $(".alert").hide();
                },
                success: function (data) {
                    if (data.status == true) {
                        $("#updateSuccess").show();
                    } else {
                        $("#updateError").show();
                    }
                }
            });
        }
    });

</script>

<style>
    .portlet-body table .logoWrap{
        width: 80px;
        height: 80px;
        vertical-align: middle;
    }
    .portlet-body table .logoWrap img{
        width: 100%;
    }


    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>