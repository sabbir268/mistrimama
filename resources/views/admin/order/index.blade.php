@extends('admin.home.template')

@section('body')

<form action="" id="order_form" method="POST">
    @csrf
    <div class="row imergency" style="display:none">
        <div class="alert alert-warning" role="alert">
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> --}}
            <i class="font-icon font-icon-warning"></i>
            <strong>N.B.</strong>For emergency service hour (8:00 pm to 8:00 am) an additional BDT 500 will be added.
        </div>
    </div>
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
                <input type="text" value="" name="user_id" id="user_id" hidden>
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
            <input type="text" id="area_input" name="" class="form-control" style="display:none">
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
            <textarea name="address" id="address" rows="3" class="form-control">

            </textarea>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Date: <span class="fullname_err"></label>
                <input type="date" class="form-control" id="order_date" name="order_date" placeholder="Enter Date"
                    required>
            </div>

            <div class="form-group col-md-6">
                <label for="">Time: <span class="fullname_err"></label>
                <select name="order_time" id="order_time" class="form-control" required>
                    <option value="">Chose Time</option>
                    <option value="12:00 AM">12:00 AM </option>
                    <option value="1:00 AM">01:00 AM </option>
                    <option value="2:00 AM">02:00 AM </option>
                    <option value="3:00 AM">03:00 AM </option>
                    <option value="4:00 AM">04:00 AM </option>
                    <option value="5:00 AM">05:00 AM </option>
                    <option value="6:00 AM">06:00 AM </option>
                    <option value="7:00 AM">07:00 AM </option>
                    <option value="8:00 AM">08:00 AM </option>
                    <option value="9:00 AM">09:00 AM </option>
                    <option value="10:00 AM">10:00 AM </option>
                    <option value="11:00 AM">11:00 AM </option>
                    <option value="12:00 PM">12:00 PM </option>
                    <option value="1:00 PM">01:00 PM </option>
                    <option value="2:00 PM">02:00 PM </option>
                    <option value="3:00 PM">03:00 PM </option>
                    <option value="4:00 PM">04:00 PM</option>
                    <option value="5:00 PM">05:00 PM </option>
                    <option value="6:00 PM">06:00 PM </option>
                    <option value="7:00 PM">07:00 PM </option>
                    <option value="8:00 PM">08:00 PM </option>
                    <option value="9:00 PM">09:00 PM </option>
                    <option value="10:00 PM">10:00 PM </option>
                    <option value="11:00 PM">11:00 PM</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="">Referal Code: <span class="fullname_err"></label>
                <input type="text" class="form-control" id="ref_code" name="ref_code" placeholder="Enter Referal Code">
            </div>

            <div class="form-group col-md-12">
                <label for="">Promocode: <span class="fullname_err"></label>
                <select class="form-control" id="disc" name="disc">
                    <option value="0">Select Promocode</option>
                    @php
                    $promotions = \App\Promotion::where('status','0')->get();
                    @endphp
                    @foreach ($promotions as $promo)
                    <option value="{{$promo->percent}}">{{$promo->promocode}}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <div class="row">
            <button class="col-md-12 btn btn-primary" type="button" id="place_order_btn">Place Order</button>
        </div>
    </div>
</form>
<div class="col-md-6" style="margin-top:15px">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Category: <span class="fullname_err"></label>
                {{-- <input type="text" id="fullname" name="fullname"  placeholder="Name" required> --}}
                <select name="category" class="form-control" id="category">
                    <option value="">Select category...</option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="margin: 27px;">
                <b>Total Price: <span id="grand_total">0</span> </b>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Services: <span class="fullname_err"></label>
        {{-- <input type="text" id="fullname" name="fullname"  placeholder="Name" required> --}}
        {{-- <select name="category" class="form-control" id="category">
                @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
        </select> --}}
        <div id="service_box" class="col-md-12" style="height:450px;overflow: auto;border: 1px solid #c2cad8;">

        </div>

    </div>
</div>


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
                <div class="row">
                    <div class="col-md-6 ">
                        <span class="remarks pull-left"></span>
                        <span class="pull-right">Approx. Price: <b class="sub_total"></b></span>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary service_add_finish"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary service_add_finish">Save </button>
                    </div>
                </div>
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
                url: "{{asset('/')}}/admin/new_order/"+$cat_id,
                dataType: 'json',
                success: function(data) {
                    for($i=0; $i < data.length; $i++){
                       // console.log(data[$i].name);
                        $output = ' <div class="col-md-12" style="border:1px solid #c2cad8;padding-right: 0px;"> <div class="row"><span class="col-md-6" style="padding:5px">'+data[$i].name+'</span><button type="button" data-id="'+data[$i].id+'" class="btn btn-primary float-right services" onclick="serviceSelect('+data[$i].id+')">Add</button></div><hr style="margin:0px" > <div class="row"><div class="col-md-10 col-md-offset1" id="service_section'+data[$i].id+'"></div></div></div>';

                        $('#service_box').append($output);
                    }
                    
                }
            })
        })


        function serviceSelect($service_id){
            $('.modal-body').html('');
            $.ajax({
                type: "GET",
                url: "{{asset('/')}}/admin/services_bit/"+$service_id,
                dataType: 'json',
                success: function(data) {
                    for($i=0; $i < data.length; $i++){
                       // console.log(data[$i].name);
                        $output = '<div class="row" id="service_select_panel" data-service_id="'+data[$i].sub_categories_id+'"><div class="col-md-6"><span style="padding:5px">'+data[$i].name+'</span> </div> <div class="col-md-3"> <div class="input-group"> <div class="row" style="margin-bottom:10px"> <div class="col-md-3" style="padding:0px"> <button class="btn pull-right " onclick="decrease('+data[$i].id+')"><i class="fa fa-minus"></i></button> </div> <div class="col-md-6" style="padding:0px"> <input type="text" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" data-service_id="'+data[$i].sub_categories_id+'" id="qty'+data[$i].id+'" placeholder="Qty" value="1"> </div> <div class="col-md-3" style="padding:0px"> <button class="btn" onclick="increase('+data[$i].id+')"><i class="fa fa-plus"></i></button> </div> </div> </div> </div> <div class="col-md-3"> <button type="button" id="addServices'+data[$i].id+'" onclick="serviceBitAdd('+data[$i].id+','+data[$i].sub_categories_id+')" class="btn btn-primary float-right "><i class="fa fa-plus"></i></button> <button type="button" style="display:none" id="delServices'+data[$i].id+'" onclick="serviceBitDel('+data[$i].id+','+data[$i].sub_categories_id+')" class="btn btn-danger float-right "><i class="fa fa-trash"></i></button> </div> </div>';

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
                url: "{{asset('')}}/admin/user_search/"+$val,
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
                url: "{{asset('')}}/admin/user_slected/"+$user_id,
                dataType: 'json',
                success: function(data) {
                   $('#id').val(data['id']);
                   $('#name').val(data['name']);
                   $('#phone_no').val(data['phone_no']);
                   $('#area_input').attr('name','area');
                   $('#area_input').val(data['area']);
                   $('#address').val(data['address']);
                   $('#user_id').val($user_id);
                }
            })
        })

        $('#new_user').click(function() {
            if($('#new_user').is(':checked')) { 
                $('#old_user_search').hide();
                $('#old_user_search').hide();
                $('#name').val('');
                $('#name').prop('readonly',false);
                $('#phone_no').val('');;
                $('#phone_no').prop('readonly',false);
                $('#area').show();
                $('#area_input').hide();
                $('#address').val('');
                $('#address').prop('readonly',false);
            }else{
                $('#old_user_search').show();
            }
        });

        $('#old_user').click(function() {
            if($('#old_user').is(':checked')) { 
                $('#old_user_search').show();
                $('#name').attr('readonly','true');
                $('#phone_no').attr('readonly','true');
                $('#area').hide();
                $('#area_input').show();
                $('#address').attr('readonly','true');
                $('#area_input').attr('readonly','true');
            }else{
                $('#old_user_search').hide();
                $('#name').prop('readonly',false);
                $('#phone_no').prop('readonly',false);
                $('#area').prop('readonly',false);
                $('#address').prop('readonly',false);
            }
        });


        function qtyUpdate(id, qty , service_id) {
            jQuery.ajax({
                url: "{{route('update.qty')}}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "service_id": service_id,
                    "id": id,
                    "qty": qty
                },
                dataType: 'html',
                success: function(response){
                    // if(!isNaN(response)){
                        var data = JSON.parse(response);
                        $('.sub_total').text(data.total_price);
                        $up = parseInt($('#unit_point').html());
                
                        $upp = qty * parseInt(data.unit_point_adtnl);
                        $('#unit_point').html('');
                        $('#unit_point').html($upp);
                    // }else{
                    //     addSubServices($id , $qty);
                    // }
                }
            });

            grand_total_price();
        }

        function grand_total_price(){
        $.ajax({
                url: "{{route('order.total_price')}}",
                type: 'get',
                dataType: 'html',
                success: function(response) {
                    $('#grand_total').html(response);
                }
            });
        }
   
        function increase(id){
            $id = id;
            $qty = $('#qty' + $id).val();
            $qty++;
            $('#qty' + $id).val($qty);

            $service_id = $('#qty' + $id).data('service_id');
            qtyUpdate($id, $qty , $service_id);
        }

        function decrease(id){
            $id = id;
            $qty = $('#qty' + $id).val();
            if ($qty != 1) {
                $qty--;
            }
            $('#qty' + $id).val($qty);
            $service_id = $('#qty' + $id).data('service_id');
             qtyUpdate($id, $qty , $service_id);
        }


       

        function serviceBitAdd(id,service_id){
            $qty = $('#qty'+id).val();

            $.ajax({
            url: "{{route('admin.order.addServiceBit')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
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
                    $('#addServices'+id).hide();
                    $('#delServices'+id).show();

                    var data = response;
                    $('.sub_total').html(data.total_price);
                    
                    $('.remarks').html('');
                    $('.remarks').html('<span id="unit_point">'+data.unit_remarks+'</span> '+data.unit_type+'');
                    
                   // $('.brief').html('<span class="p-2 d-block">'+data.brief+'</span>');
                   
                // }
            }
         });

         grand_total_price();
        }

        function serviceBitDel(id,service_id) {
        $.ajax({
            url: "{{route('admin.order.delServiceBit')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": service_id,
                "id": id
            },
            dataType: 'json',
            success: function(response) {
                $('#addServices'+id).show();
                $('#delServices'+id).hide();
                $('.remarks').html('');
                $('.sub_total').html(0);
                
                $('#selected_sub_service_showed'+id).hide();
            }
        });
        grand_total_price();
    }

    $('.service_add_finish').click(function(){
       $servicec_id = $('#service_select_panel').data('service_id');

       $.ajax({
                type: "GET",
                url: "{{asset('')}}/admin/retrive_selected_service_bit/"+$servicec_id,
                dataType: 'json',
                success: function(data) {
                    for($i=0; $i < data.length; $i++){
                       // console.log(data[$i].name);
                       $output = '<div class="row" id="selected_sub_service_showed'+data[$i].sub_cat_details_id+'"  data-service_id="'+data[$i].sub_categories_id+'"><div class="col-md-6"><span style="padding:5px">'+data[$i].service_details_name+'</span> </div> <div class="col-md-3"> <div class="input-group"> <div class="row" style="margin-bottom:10px"> <div class="col-md-3" style="padding:0px"> <button type="button" class="btn pull-right " onclick="decrease('+data[$i].sub_cat_details_id+')"><i class="fa fa-minus"></i></button> </div> <div class="col-md-6" style="padding:0px"> <input type="text" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" data-service_id="'+data[$i].sub_categories_id+'" id="qty'+data[$i].sub_cat_details_id+'" placeholder="Qty" value="'+data[$i].quantity+'"> </div> <div class="col-md-3" style="padding:0px"> <button type="button" class="btn" onclick="increase('+data[$i].sub_cat_details_id+')"><i class="fa fa-plus"></i></button> </div> </div> </div> </div> <div class="col-md-3"> <button type="button"  id="delServices'+data[$i].sub_cat_details_id+'" onclick="serviceBitDel('+data[$i].sub_cat_details_id+','+data[$i].sub_categories_id+')" class="btn btn-danger float-right "><i class="fa fa-trash"></i></button> </div> </div>';
                        $('#service_section'+$servicec_id).append($output);

                        $('#servicess_momdal').modal('hide');
                    }
                }
            });

            grand_total_price();
       
    });
       

    
    
       


        // $(document).ready(function() { 
        //     $.ajax({
        //         type: "GET",
        //         url: "{{asset('/')}}/admin/services_bit/"+$service_id,
        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data);
        //         }
        //     })
        // });

        $(document).ready(function() { 
           // $(window).off('beforeunload');
        //     $(window).on('beforeunload', function(){
        //           return 'Are you sure you want to leave?';
        //    });
        });


        $('#order_time').change(function(){
            $time = $('#order_time').val();
            $time = $time.split(" ");
            $num = parseInt($time[0]);
            $met = $time[1];
            console.log($num);
            console.log($met);
            
            if(($num > 8  && $met == 'PM') || ($num < 8 && $met == 'AM')){
                //alert("In this case we'll charge 500 tk extra for emergency ");
                $('.imergency').show();
                if($num == 12  && $met == 'PM'){
                    $('.imergency').hide();
                }
                
            }else{
                $('.imergency').hide();  
                if($num == 12  && $met == 'AM'){
                    $('.imergency').show();
                } 
            }  
        });


        // $('#order_form').submit(function(e){
        //     e.preventDefault;

        //     console.log($(this).serialize());
        // })

        $('#place_order_btn').click(function(e){
            $data = $('#order_form').serialize();
            $.ajax({
                url: "{{route('admin.order.done')}}",
                type: 'post',
                data: $data,
                dataType: 'html',
                success: function(response) {
                    // alert(response);
                    // console.log(response);
                    if(response == 'ok'){    
                        alert('Order Placed successfully');
                        location.reload();
                    }else{
                        alert(response);
                    }
                }
             });
        })

    
</script>

{{Session::forget('order_id')}}
@endsection