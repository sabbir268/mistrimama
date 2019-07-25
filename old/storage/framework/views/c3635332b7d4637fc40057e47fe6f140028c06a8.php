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
        <section class="tabs-section">
            <div class="tabs-section-nav tabs-section-nav-icons">
                <div class="tbl">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" href="#tabs-1-tab-1" role="tab" data-toggle="tab"
                                aria-selected="true">
                                <span class="nav-link-in">
                                    <i class="font-icon font-icon-wallet"></i>
                                     MFS / Bank 
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="tab" data-toggle="tab" aria-selected="false"  style="cursor: not-allowed">
                                <span class="nav-link-in">
                                    <span class="font-icon font-icon-player-subtitres"></span>
                                    Card Payment
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--.tabs-section-nav-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active show" id="tabs-1-tab-1">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <form action="<?php echo e(route('esp.recharge.request')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">MSF</span>
                                </div>
                                <!-- <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"> -->
                                <select class="form-control" name="mfs" id="mfs">
                                    <option>Select MFS</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="surecash">Sure Cash</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Transaction Id</span>
                                </div>
                                <input type="text" name="trxn" minlength="15" maxlength="15" class="form-control"
                                    placeholder="xxxxxxxx" required>
                            </div>
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
                                </div>
                                <input type="number"  id="amount_place" max="99999" minlength="2" maxlength="5" class="form-control">
                                <div class="input-group-append">
                                    <input type="number" name="amount" id="amount" max="99999" minlength="2" maxlength="5" class="form-control rounded-0 " readonly>
                                </div>
                            </div>


                            <button class="btn btn-success col-md-12" type="submit">Confirm</button>

                        </form>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <form action="">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Card Number</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">EXP
                                                Date</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default"
                                            aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">CVV</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default"
                                            aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-success col-md-12" type="submit">Confirm</button>

                        </form>
                    </div>
                </div>
                <!--.tab-pane-->
            </div>
            <!--.tab-content-->
            <hr>
            <div class="col-md-12">
                <div class="mfs-content">
                    <p class="bkash d-none">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>

                    <p class="surecash d-none">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo
                    </p>

                    <p class="rocket d-none">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </p>

                    <p class="bank d-none">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut eni
                    </p>

                    <p class="all"> 
                        
                            Mistri Mama allows you to recharge online balance from your bKash / Rocket / Sure Cash and direct Mistri Mama bank account. You can recharge from your own mobile phone or someone else's mobile phone.
                            Follow the steps below –
                            <ol class="pl-5">
                                <li>Go to your Mistri Mama account from website</li>
                                <li>Select “Recharge”</li>
                                <li>Choose your payment mode</li>
                                <li>Insert your transaction ID</li>
                                <li>Enter the amount you want to recharge</li>
                                <li>Press confirm</li>
                            </ol>
                            Done! You will receive a confirmation message from Mistri Mama and the recharge amount will be added on your Mistri Mama online balance.
                        
                    </p>
                </div>

            </div>
        </section>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>    

    $bkash = <?php echo e(MfsCharge('bkash')); ?>;
    $rocket = <?php echo e(MfsCharge('rocket')); ?>;
    $surecash = <?php echo e(MfsCharge('surecash')); ?>;
    $bank = <?php echo e(MfsCharge('bank')); ?>;


    function amountcal(){
        $am = $('#amount_place').val();
        $mfs = $('#mfs').val();

        if($mfs == 'bkash'){
            $tam = $am - ($am*$bkash/100);
            $('#amount').val($tam);
        }

        if($mfs == 'rocket'){
            $tam = $am - ($am*$rocket/100);
            $('#amount').val($tam);
        }

        if($mfs == 'surecash'){
            $tam = $am - ($am*$surecash/100);
            $('#amount').val($tam);
        }

        if($mfs == 'bank'){
            $tam = $am - ($am*$bank/100);
            $('#amount').val($tam);
        }
    }


    $('.bkash').hide();
    $('.surecash').hide();
    $('.rocket').hide();
    $('.bank').hide();

    $('#mfs').change(function(){
        $mfs = $(this).val();

        if($mfs == 'bkash'){
            $('.bkash').show();
            $('.surecash').hide();
            $('.rocket').hide();
            $('.bank').hide();
        }else if($mfs == 'surecash'){
            $('.bkash').hide();
            $('.surecash').show();
            $('.rocket').hide();
            $('.bank').hide();
        }else if($mfs == 'rocket'){
            $('.bkash').hide();
            $('.surecash').hide();
            $('.rocket').show();
            $('.bank').hide();
        }else if($mfs == 'bank'){
            $('.bkash').hide();
            $('.surecash').hide();
            $('.rocket').hide();
            $('.bank').show();
        }else{
            $('.bkash').hide();
            $('.surecash').hide();
            $('.rocket').hide();
        }   


        amountcal();
    });


    $('#amount_place').keyup(function(){
        amountcal();
    })

</script>

<script>
    $(document).ready(function() {
            $('.panel').each(function () {
                try {
                    $(this).lobiPanel({
                        sortable: true
                    }).on('dragged.lobiPanel', function(ev, lobiPanel){
                        $('.dahsboard-column').matchHeight();
                    });
                } catch (err) {}
            });
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>