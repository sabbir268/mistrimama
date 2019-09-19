<?php $__env->startSection('body'); ?>

<form action="">
    <div class="col-md-6" style="margin-top:15px">
        <div class="row">

            <div class="form-group col-md-6">
                <div class="radio">
                    <label><input type="radio" id="new_user" name="user_type" value="new_user" checked>New User</label>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="radio">
                    <label><input type="radio" id="old_user" name="user_type" value="old_user">Old User</label>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="form-group col-md-12" id="old_user_search" style="display:none ">
                <label for="">Search User: </label>
                <input type="text" list="users_list" class="form-control" id="user_search"
                    placeholder="Name , Phone Number">
                <datalist id="users_list">

                </datalist>
            </div>

            <div class="form-group col-md-6">
                <input type="text" value="" name="id" id="user_id" hidden>
                <label for="">Name: <span class="fullname_err"></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="">Phone: <span class="fullname_err"></label>
                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Phone Number"
                    required>
            </div>
        </div>

        <div class="form-group">
            <label for="">Area: <span class="fullname_err"></label>
            <select name="area" id="area" class="form-control" required>
                <option value="" selected="false" class="locationDropdown">Select Area</option>
                <option value="Adabor"> Adabor</option>
                <option value="Azampur"> Azampur</option>
                <option value="Badda"> Badda</option>
                <option value="Darus Salam"> Darus Salam</option>
                <option value="Dhanmondi"> Dhanmondi</option>
                <option value="Gulshan"> Gulshan</option>
                <option value="Kafrul"> Kafrul</option>
                <option value="Kalabagan"> Kalabagan</option>
                <option value="Khilgaon"> Khilgaon</option>
                <option value="Khilkhet"> Khilkhet</option>
                <option value="Mirpur">Mirpur</option>
                <option value="Mohammadpur"> Mohammadpur</option>
                <option value="Motijheel"> Motijheel</option>
                <option value="New Market"> New Market</option>
                <option value="Old Town"> Old Town</option>
                <option value="Pallabi"> Pallabi</option>
                <option value="Paltan"> Paltan</option>
                <option value="Ramna"> Ramna</option>
                <option value="Rampura"> Rampura</option>
                <option value="Sabujbagh"> Sabujbagh</option>
                <option value="Shahbagh"> Shahbagh</option>
                <option value="Shegunbagicha"> Shegunbagicha</option>
                <option value="Sher-e-Bangla_Nagar"> Sher-e-Bangla Nagar</option>
                <option value="Tejgaon"> Tejgaon</option>
                <option value="Uttar Khan"> Uttar Khan</option>
                <option value="Uttara"> Uttara</option>
                <option value="Vatara"> Vatara</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="10" rows="3" class="form-control">

            </textarea>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:15px">
        <div class="form-group">
            <label for="">Category: <span class="fullname_err"></label>
            
            <select name="category" class="form-control" id="category">
                <option value="">Select category...</option>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Services: <span class="fullname_err"></label>
            
            
            <div id="service_box" style="height:450px;overflow: auto;border: 1px solid #c2cad8;">

            </div>

        </div>
    </div>
</form>

<div class="modal fade" id="servicess_momdal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Services</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->

<script>
    $("#category").change(function() {
        $cat_id = $(this).val();
        $('#service_box').html("");
            $.ajax({
                type: "GET",
                url: "<?php echo e(asset('/')); ?>/admin/new_order/"+$cat_id,
                dataType: 'json',
                success: function(data) {
                    for($i=0; $i < data.length; $i++){
                       // console.log(data[$i].name);
                        $output = ' <div class="col-md-12" style="border:1px solid #c2cad8;padding-right: 0px;"><span class="col-md-6" style="padding:5px">'+data[$i].name+'</span><button type="button" data-id="'+data[$i].id+'" class="btn btn-primary float-right services" onclick="serviceSelect('+data[$i].id+')">Add</button></div>';

                        $('#service_box').append($output);
                    }
                    
                }
            })
        })


        function serviceSelect($service_id){
            $('.modal-body').html('');
            $.ajax({
                type: "GET",
                url: "<?php echo e(asset('/')); ?>/admin/services_bit/"+$service_id,
                dataType: 'json',
                success: function(data) {
                    for($i=0; $i < data.length; $i++){
                       // console.log(data[$i].name);
                        $output = '<div class="row"><div class="col-md-6"><span style="padding:5px">'+data[$i].name+'</span> </div> <div class="col-md-3"> <div class="input-group"> <div class="row" style="margin-bottom:10px"> <div class="col-md-3" style="padding:0px"> <button class="btn pull-right decrease" data-id="'+data[$i].id+'"><i class="fa fa-minus"></i></button> </div> <div class="col-md-6" style="padding:0px"> <input type="text" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="qty'+data[$i].id+'" placeholder="Qty" value="1"> </div> <div class="col-md-3" style="padding:0px"> <button class="btn increase" data-id="'+data[$i].id+'"><i class="fa fa-plus"></i></button> </div> </div> </div> </div> <div class="col-md-3"> <button type="button" onclick="serviceBitAdd('+data[$i].id+','+data[$i].sub_categories_id+')" class="btn btn-primary float-right add-services">Add</button> </div> </div>';

                        $('.modal-body').append($output);
                    }


                    $('#servicess_momdal').modal('show');
                }
            })
        }

        $('#user_search').focus(function(){
            $('#users_list').html("");
        })

        $('#user_search').keydown(function(){
            $val = $(this).val();
           // console.log($val);
            $.ajax({
                type: "GET",
                url: "<?php echo e(asset('')); ?>/admin/user_search/"+$val,
                dataType: 'json',
                success: function(data) {
                    for($i=0; $i < data.length; $i++){
                       // console.log(data[$i].name);
                        $output = '<option value="Id:'+data[$i].id+',Phone:'+data[$i].phone_no+',Name:'+data[$i].name+'">';
                        $('#users_list').append($output);
                    }
                }
            })
        });

        $('#user_search').change(function(){
            $user_id = $(this).val().split(":")[1].split(",")[0];
            $.ajax({
                type: "GET",
                url: "<?php echo e(asset('')); ?>/admin/user_slected/"+$user_id,
                dataType: 'json',
                success: function(data) {
                   $('#id').val(data['id']);
                   $('#name').val(data['name']);
                   $('#phone_no').val(data['phone_no']);
                   $('#area').val(data['area']);
                   $('#address').val(data['address']);
                }
            })
        })

        $('#new_user').click(function() {
            if($('#new_user').is(':checked')) { 
                $('#old_user_search').hide();
            }else{
                $('#old_user_search').show();
            }
        });

        $('#old_user').click(function() {
            if($('#old_user').is(':checked')) { 
                $('#old_user_search').show();
            }else{
                $('#old_user_search').hide();
            }
        });


   


        $(".decrease").click(function() {
            $id = $(this).data('id');
            $qty = $('#qty' + $id).val();
            if ($qty != 1) {
                $qty--;
            }
            $('#qty' + $id).val($qty);

          //  qtyUpdate($id, $qty);
        });

        $(".increase").click(function() {
            $id = $(this).data('id');
            $qty = $('#qty' + $id).val();
            $qty++;
            $('#qty' + $id).val($qty);

            //qtyUpdate($id, $qty);
        });

        function serviceBitAdd(id,service_id){
            $qty = $('#qty'+id).val();

            $.ajax({
            url: "<?php echo e(route('admin.order.addServiceBit')); ?>",
            type: 'post',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "service_id": service_id,
                "id": id,
                "qty": $qty,
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // if (response == 'done') {
                //     $('#addRemove' + id).html('ADD');
                // } else {
                //     var data = JSON.parse(response);
                //     $('.sub_total').html(data.total_price);
                    
                //     $('.remarks').html('');
                //     $('.remarks').append('<li><span id="unit_point">'+data.unit_remarks+'</span> '+data.unit_type+'</li>');
                    
                //     $('.brief').html('<span class="p-2 d-block">'+data.brief+'</span>');
                // }
            }
         })
        }
       
       


        // $(document).ready(function() { 
        //     $.ajax({
        //         type: "GET",
        //         url: "<?php echo e(asset('/')); ?>/admin/services_bit/"+$service_id,
        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     })
        // });
</script>

<?php echo e(Session::forget('order_id')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>