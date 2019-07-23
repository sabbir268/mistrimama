<?php $__env->startSection('body'); ?>

<h1 class="page-title">Accounts
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('alert-' . $msg)): ?>
        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <button class="btn btn-primary" data-target="#newTransactionModal" data-toggle="modal">New Entry </button>
        <br>
        <br>

        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>All Accounts Transaction</div>
            </div>

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>SL</th>
                            <th>Transaction Date</th>
                            <th>Entry Date</th>
                            <th>Type</th>
                            <th>Heading</th>
                            <th>Details</th>
                            <th>Amount</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($accounts): ?>
                        <?php
                        $i = 1;
                        ?>
                        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i); ?> <?php $i++ ?> </td>
                            <td><?php echo e($account->date); ?></td>
                            <td><?php echo e($account->created_at); ?></td>
                            <td><?php echo e($account->type); ?></td>
                            <td><?php echo e($account->heading); ?></td>
                            <td><?php echo e($account->details); ?></td>
                            <td><?php echo e($account->amount); ?></td>
                            <td><?php echo e($account->status); ?></td>
                            
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($accounts->links()); ?>


                <?php endif; ?>

            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="newTransactionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.accounts.insert')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="debit">Expenses</option>
                            <option value="credit">Revenue</option>
                        </select>
                    </div>

                    <div class="form-group" id="expenses">
                        <label for="status">Expenses Hedings</label>
                        <select name="heading" id="heading" class="form-control">
                            <?php $__currentLoopData = $headingsExpence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($head->title); ?>"><?php echo e($head->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group" id="revenue" style="display:none">
                        <label for="status">Revenue Hedings</label>
                        <select name="heading" id="heading" class="form-control">
                            <?php $__currentLoopData = $headingsRevenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($head->title); ?>"><?php echo e($head->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="status">Amount</label>
                        <input type="number" class="form-control" name="amount">
                    </div>

                    <div class="form-group">
                        <label for="status">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="check">Check</option>
                            <option value="bank">Bank</option>
                            <option value="other">Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Details</label>

                        <textarea class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#status').change(function(){
        if($(this).val() == 'credit'){
            $('#expenses').hide();
            $('#revenue').show();
        }else{
            $('#expenses').show();
            $('#revenue').hide();
        }
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>