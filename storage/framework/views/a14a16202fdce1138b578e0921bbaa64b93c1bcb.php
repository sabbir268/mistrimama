<?php $__env->startSection('stylesheets'); ?>
    <link href="/css/picker/default.css" rel="stylesheet" type="text/css"/>
    <link href="/css/picker/default.date.css" rel="stylesheet" type="text/css"/>
    <link href="/css/picker/default.time.css" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <link href="<?php echo e(url('datepicker/glDatePicker.default.css')); ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php echo $__env->make('web.booking.booking_frm_css', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <style type="text/css">
        .social-menu.social-menu_right-arrow {
            bottom: -21px;
        }
        .phone {
            display: flex;
            flex-direction: column;
        }
        @media (max-width: 767px) {
            .calanderDiv {
                padding: 0px !important;
                margin: 0px !important;
            }
        }
        .btn.btn-xs, .btn-group-xs {
            font-size: 13px;
            padding: 4px 15px !important;
        }
    </style>


    <div class="image-container set-full-height"
         style="background-image: url('http://demos.creative-tim.com/material-bootstrap-wizard/assets/img/wizard-book.jpg')">
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!-- Wizard container -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">

                            <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                            <div class="wizard-header">
                                <h5 class="change-header"><?php echo e($ServiceName[0]->name); ?></h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#details" data-toggle="tab">Services</a></li>
                                    <li><a href="#captain" data-toggle="tab">Schedule</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="details">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="panel" style="height: 300px;overflow-y: scroll;">
                                                <?php $__currentLoopData = $Sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <form action="<?php echo e(url('Booking/service-categeory-store')); ?>"
                                                          method="post" class="step1Form" data-category-id="<?php echo e($data->id); ?>" data-base-price="<?php echo e($data->price); ?>"
                                                          data-additional-price="<?php echo e($data->additional_price); ?>">
                                                        <?php echo e(csrf_field()); ?>

                                                        <p class="list-group"
                                                           style="padding: 10px; border-bottom: 1px solid grey">
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-xs pull-right"
                                                                    style="margin-top:9px;" id="<?php echo e($data->id); ?>" data-cat-id="<?php echo e($data->id); ?>">ADD
                                                            </button>

                                                            <input type="hidden" name="ID" value="<?php echo e($data->id); ?>">
                                                            <button type="button"
                                                                    class="btn btn-info btn-xs pull-right Incresingbtn" id="increase-<?php echo e($data->id); ?>"
                                                                    onclick="increaseQuantity(this, <?php echo e($data->id); ?>)"
                                                                    data-base-price="<?php echo e($data->price); ?>" data-additional-price="<?php echo e($data->additional_price); ?>"
                                                                    style="margin-top:9px;">+
                                                            </button>
                                                            <input type="text" value="1"
                                                                   class="btn-xs col-xs-1 qtyTextField pull-right"
                                                                   name="qty" placeholder="Qty"
                                                                   id="increment<?php echo e($data->id); ?>"
                                                                   style="margin-top: 9px; padding: 3px 1px !important;font-size: 13px;">
                                                            <button type="button"
                                                                    class="btn btn-info btn-xs pull-right desressingBtn" id="decrease-<?php echo e($data->id); ?>"
                                                                    onclick="decreaseQuantity(this, <?php echo e($data->id); ?>)"
                                                                    data-base-price="<?php echo e($data->price); ?>" data-additional-price="<?php echo e($data->additional_price); ?>">-
                                                            </button>

                                                            <span style="font-size: .9em;"><?php echo e($data->name); ?></span>
                                                            <br>

                                                            <span>Price: ৳
                                                                <span><?php echo e($data->price); ?></span>
                                                            </span>&nbsp;&nbsp;
                                                            <span>Additional Price: ৳
                                                                <span><?php echo e($data->additional_price); ?></span>
                                                            </span>
                                                            <br/>
                                                            <span>Unit Remark:
                                                                <span><?php echo e($data->unit_remark); ?></span>
                                                            </span>
                                                        </p>
                                                    </form>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="captain">
                                    <form action="<?php echo e(url('Booking/detail-store')); ?>" method="post"
                                          class="form-inline">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="row">
                                                <div class="form-group col-xs-6 calanderDiv">
                                                    <input id="datepicker" class="datepicker" name="date" placeholder="Choose a Date"/>
                                                </div>
                                                <div class="form-group col-xs-6 calanderDiv">
                                                    <input id="timepicker" class="timepicker" name="time" placeholder="Choose a Time"/>
                                                </div>
                                        </div>

                                        <!-- <button type="button" id="show-model" data-toggle="modal"
                                                data-target="#loginModal" style="display:none"></button> -->

                                        <b class="pull-right" style="margin-top:0px">
                                            <!-- <?php if(auth()->user() == null): ?>
                                            <input type='submit' class='btn  btn-danger btn-wd' name='next'
                                                   value='SUBMIT'/>
                                            <?php else: ?> -->
                                                <input type='submit' class='btn  btn-danger' name='next'
                                                       value='SUBMIT'/>
                                            <!-- <?php endif; ?> -->
                                        </b>
                                    </form>
                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next'
                                               value='Next'/>

                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd'
                                               name='previous' value='Previous'/>

                                        <div class="footer-checkbox">
                                            <div class="col-sm-12">
                                                <span class="checkbox">
                                                    <label>

                                                    </label>
                                                    <?php
                                                    $number = (Session::get('mycat')) ? count(Session::get('mycat')) : 0;
                                                     $GT = 0; $SubTotal = 0;
                                                    ?>
                                                    <?php if($number>0): ?>
                                                        <?php for($i=0; $i<$number;$i++): ?>
                                                            <?php
                                                            $quantity = session('myqty')[$i];
                                                            $extras = ($quantity > 1) ? $quantity - 1 : 0;
                                                            $catPrice = session('CatPrice')[$i];
                                                            $additionalPrice = session('additional_price')[$i];
                                                            $Subtotal = $catPrice + ($extras * $additionalPrice);;
                                                            ?>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    Approximate Price : <span id="grand_total"><?php echo e($GT); ?></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

    <?php echo $__env->make('web.booking.booking_frm_js', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="/js/picker.js" type="text/javascript"></script>
    <script src="/js/picker.date.js" type="text/javascript"></script>
    <script src="/js/picker.time.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            //$("#datepicker").datepicker();
            $('.datepicker').pickadate({
                onSet: function () {
                    var $input = $('.timepicker').pickatime();
                    var picker = $input.pickatime('picker');
                    picker.open();
                }
            });
        });
        $(function () {
            //$("#datepicker").datepicker();
            $('.timepicker').pickatime({
                interval: 60,
            });
        });
    </script>

    <script type="text/javascript">
        $('.step1Form').on('submit', function (event) {
            event.preventDefault();
            let element = $(this);
            let categoryID = $(this).attr('data-category-id'),
                textFieldId = "increment" + categoryID,
                qtyVal = $('#' + textFieldId).val(),
                fulQty = qtyVal;

            $('#' + textFieldId).val(fulQty);

            let base_price = parseInt(element.attr('data-base-price'));
            let additional_price = parseInt(element.attr('data-additional-price'));
            if (isNaN(additional_price)) {additional_price = 0;}
            let extras = 0;
            if (qtyVal >= 1) {
                extras = qtyVal -1;
            }
            var grand_total = base_price + (additional_price * extras);
            console.log({
                "first_price": element.attr('data-additional-price'),
                grand_total, base_price, additional_price, extras
            });
            $('#grand_total').text(grand_total);
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                dataType: 'html',
                data: $(this).serialize(),

                success: function (response) {
                    var res = JSON.parse(response);
                    var ids = res['id'];
                    var tPrice = res['tPrice'];
                    console.log(ids);
                    console.log(tPrice);
                    $('#' + ids).text("ADDED");
                    $('#grand_total').text(tPrice);
                }
            });

            return false;
        });
    </script>

    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"
            integrity="sha256-xI/qyl9vpwWFOXz7+x/9WkG5j/SVnSw21viy8fWwbeE="
            crossorigin="anonymous"></script>

    <script>
        $(function () {
            $("#datepicker").on('change', function () {
                $('.showDate').val($(this).val());
            });
        });
    </script>
    <!-- <script>
        $(function () {
            let authenticated = false;
            <?php if(auth()->user() != null): ?>
                    authenticated = true;
            <?php endif; ?>

            $(".form-second-One").on('submit', function () {
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    dataType: 'html',
                    data: $(this).serialize(),
                    success: function (response) {
                        if (authenticated) {
                            window.location.href="all-booking-store";
                        }else {
                            $('#show-model').click();
                        }
                    }
                });
                return false;
            });
        });
    </script> -->


    <script>
        function increaseQuantity(element, categoryID) {
            element = $(element);
            var textFieldId = "increment" + categoryID;
            var qtyVal = $('#' + textFieldId).val();
            var fulQty = ++qtyVal;
            $('#' + textFieldId).val(fulQty);

            let base_price = parseInt(element.attr('data-base-price'));
            let additional_price = parseInt(element.attr('data-additional-price'));
            if (isNaN(additional_price)) {additional_price = 0;}
            let extras = 0;
            if (qtyVal >= 1) {
                extras = qtyVal -1;
            }
            var grand_total = base_price + (additional_price * extras);
            console.log({
                "first_price": element.attr('data-additional-price'),
                grand_total, base_price, additional_price, extras
            });
            $('#grand_total').text(grand_total);
            var urls = "Booking/justQtySave/" + categoryID + "/" + fulQty;
            $.ajax({
                url: urls,
                type: 'get',
                dataType: 'html',
                success: function (response) {

                }
            });
        }

        function decreaseQuantity(element, categoryID) {
            element = $(element);
            var textFieldId = "increment" + categoryID;
            var qtyVal = $('#' + textFieldId).val();
            var fulQty = --qtyVal;
            $('#' + textFieldId).val(fulQty);
            let base_price = parseInt(element.attr('data-base-price'));
            let additional_price = parseInt(element.attr('data-additional-price'));
            if (isNaN(additional_price)) {additional_price = 0;}
            let extras = 0;
            if (qtyVal >= 1) {
                extras = qtyVal -1;
            }
            var grand_total = base_price + (additional_price * extras);
            console.log({
                "first_price": element.attr('data-additional-price'),
                grand_total, base_price, additional_price, extras
            });
            $('#grand_total').text(grand_total);
        }
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>