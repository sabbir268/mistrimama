<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb bg-white mb-1">
            <li><a href="<?php echo e(route('esp-dashboard')); ?>">Dashboard</a></li>
            <li><a href="#">Comrade</a></li>
        </ol>

        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading">
                <div class="row">
                    <div class="col-md-6 float">
                        <button type="button" class="btn btn-sm btn-mm btn-inline " data-toggle="modal"
                            data-target="#addComradeMdl">Add New</button>
                    </div>
                    <div class="col-md-6">
                        <form class="site-header-search ">
                            <input type="text" placeholder="Search" />
                            <button type="submit">
                                <span class="font-icon-search"></span>
                            </button>
                            <div class="overlay"></div>
                        </form>
                    </div>
                </div>
            </header>
            <div class="box-typical-body panel-body ">
                <table class="tbl-typical">
                    <thead>
                        <tr>
                            <th>
                                <div>Picture</div>
                            </th>
                            <th>
                                <div>Name</div>
                            </th>
                            <th>
                                <div>Phone No.</div>
                            </th>
                            <th>
                                <div>Email</div>
                            </th>
                            <th>
                                <div>NID No.</div>
                            </th>
                            <th>
                                <div>View</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $comrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img style="height:50px;width:50px" src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($comrade->c_pic); ?>"
                                    class="rounded-circle" alt="some"></td>
                            <td><?php echo e($comrade->c_name); ?></td>
                            <td><?php echo e($comrade->c_phone_no); ?></td>
                            <td><?php echo e($comrade->email); ?></td>
                            <td><?php echo e($comrade->c_nid); ?></td>
                            <td>
                                <div class="btn-gorup">
                                    <button class="btn btn-sm btn-success "><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
        </section>
        <!--.box-typical-dashboard-->
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade " id="addComradeMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('comrade-insert')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-1">
                                <label class="control-label " for="c_name">Full Name:</label>
                                <div class="">
                                    <input name="c_name" type="text" class="form-control"
                                        placeholder="Ex: Karim Hossain" required>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_phone_no">Phone:</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-0 bg-white">+88</span>
                                    <input type="tel" name="c_phone_no" pattern="+[0-9]{11}" class="form-control"
                                        placeholder="Ex: 01775280411" required>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_alt_phone_no">Alternatove Phone:</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-0 bg-white">+88</span>
                                    <input type="tel" name="c_alt_phone_no" pattern="+[0-9]{11}" class="form-control"
                                        placeholder="Ex: 01775280411" >
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="email">Email:</label>
                                <div class="">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Ex: amaila@gmail.com" required>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nid">NID Number:</label>
                                <div class="">
                                    <input type="text" name="c_nid" class="form-control" minlength="7" maxlength="16"
                                        placeholder="Ex: 1992324234234" required>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_pic">Picture:</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="c_pic" class="custom-file-input" id="inputGroupFile02"
                                            required>
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nic_front">NID Front:</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="c_nic_front" class="custom-file-input"
                                            id="inputGroupFile02" required>
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nic_back">NID Back:</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="c_nic_back" class="custom-file-input"
                                            id="inputGroupFile02" required>
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-mm">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
    $('.custom-file-input').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>