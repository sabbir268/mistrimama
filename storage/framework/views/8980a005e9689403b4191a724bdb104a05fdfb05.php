<?php $__env->startSection('body'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

<h1 class="page-title">Users


    <small></small>

</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Users</div>
            </div>
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-12">
                        <button style="margin: 10px;" class="btn btn-primary pull-right">Total: <?php echo e($usersCount); ?></button>
                        <button style="margin: 10px;" class="btn btn-primary pull-right"><a
                                href="<?php echo e(route('users.agent.export')); ?>" target="_blank" style="color:#fff">Export to
                                CSV</a></button>
                    </div>
                </div>

                

                <table class="table table-bordered col-md-10" id="agent-users">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>MFS</th>
                            <th>MFS Number</th>
                            <th>Address</th>
                            <th>Promoter</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>


<style>
    .portlet-body table .logoWrap {
        width: 80px;
        height: 80px;
        vertical-align: middle;
    }

    .portlet-body table .logoWrap img {
        width: 100%;
    }


    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 60%;
    }

    #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
        height: 18px;
    }

    #sortable li span {
        position: absolute;
        margin-left: -1.3em;
    }

</style>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>



<script>
    $(function() {
        $('#agent-users').DataTable({
            processing: true,
            serverSide: true,
            // "dom": '<r>',
            // "dom": 'lt<"top"f>',
            columnDefs: [{targets: [1], render:function ( data, type, row, meta ) {return '<img style="height:80px" src="'+data.photo+'" alt="">';} }],

            ajax: '<?php echo route('users.agent.ajax'); ?>',
            columns: [
                { data: 'id', name: 'id' },
                { data: null },
                { data: 'name', name: 'name' },
                { data: 'phone_no', name: 'phone_number' },
                { data: 'mfs_type', name: 'mfs_type' },
                { data: 'mfs_number', name: 'mfs_number' },
                { data: 'address', name: 'address' },
                { data: 'promoter', name: 'promoter' },
            ]
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>