@extends('admin.home.template')

@section('body')
<style>
    .m-0 {
        margin: 0px !important;
    }

    .p-0 {
        padding: :0px !important;
    }

</style>
<h1 class="page-title">
</h1>
<div class="row">
    <div class="col-md-12">
        {{-- {{ $Order}} --}}
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Order# {{$order->order_no}}</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="row m-0 col-md-12">
                    <div class="well well-sm text-center" style="margin:0px">Order By</div>
                    <div class="thumbnail">
                        <img style="height:100px;width:100px"
                            src="{{$order->user ? file_exists($order->user->photo)  ? $order->user->photo : 'https://via.placeholder.com/100' : 'https://via.placeholder.com/100' }}"
                            class="img img-circle" alt="Img">
                        <div class="caption text-center">
                            <h3 class="m-0">{{$order->name}}</h3>
                            <p class="m-0">Phone: {{$order->phone}}</p>
                            <p class="m-0">Area: {{$order->area}}</p>
                            <p class="m-0">Address: {{$order->address}}</p>
                        </div>
                    </div>
                </div>

                {{-- {{$order->serviceSystem}} --}}
                @if(count($order->serviceSystem) > 0)
                <div class="row m-0 col-md-12">
                    <div class="well well-sm text-center" style="margin:0px">Service Provider</div>
                    <div class="thumbnail">
                        <img style="height:100px;width:100px"
                            src="{{$order->serviceSystem()->first()->provider ? file_exists($order->serviceSystem()->first()->provider->passport)  ? $order->serviceSystem()->first()->provider->passport : 'https://via.placeholder.com/100' : 'https://via.placeholder.com/100' }}"
                            class="img img-circle" alt="Img">
                        <div class="caption text-center">
                            <h3 class="m-0">{{$order->serviceSystem()->first()->provider->name}}</h3>
                            <p class="m-0">Phone: {{$order->serviceSystem()->first()->provider->phone_no}}</p>
                            <p class="m-0">Area: {{$order->serviceSystem()->first()->provider->zone->first()}}</p>
                        </div>
                    </div>
                </div>
                @if($order->serviceSystem()->first()->provider->type == 0)
                @if($order->serviceSystem()->first()->comrade)
                <div class="row m-0 col-md-12">
                    <div class="well well-sm text-center" style="margin:0px">Allowcated Comrade</div>
                    <div class="thumbnail">
                        <img style="height:100px;width:100px"
                            src="{{$order->serviceSystem()->first()->comrade ? file_exists($order->serviceSystem()->first()->provider->passport)  ? $order->serviceSystem()->first()->comrade->c_pic : 'https://via.placeholder.com/100' : 'https://via.placeholder.com/100' }}"
                            class="img img-circle" alt="Img">
                        <div class="caption text-center">
                            <h3 class="m-0">{{$order->serviceSystem()->first()->comrade->c_name}}</h3>
                            <p class="m-0">Phone: {{$order->serviceSystem()->first()->comrade->c_phone_no}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endif
            </div>
            <div class="col-md-8">
                <div class="well well-sm " style="margin:0px">
                    <div class="row">
                        <div class="col-md-4">Category: <b>{{$order->category->name}}</b></div>
                        <div class="col-md-5">Date/Time: <b>{{$order->order_date}}/{{$order->order_time}}</b></div>
                        <div class="col-md-3">Service Taken: <b>{{count($order->bookings)}}</b></div>
                    </div>

                </div>
                <div class="thumbnail">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Price</th>
                                <th>A. Price</th>
                                <th>Total</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->bookings as $booking)
                            <tr class="">
                                <td style="width:35%">{{$booking->service_name}}({{$booking->service_details_name}})
                                </td>
                                <td>{{$booking->price}}</td>
                                <td>{{$booking->quantity > 1 ? $booking->aditional_price : 0}}</td>
                                <td>{{$booking->total_price}}</td>
                                <td style="width:20%">
                                    <div class="only_quantity{{$booking->id}}">
                                        {{$booking->quantity}}
                                    </div>
                                    <div class="quantity_edit{{$booking->id}}" style="display:none">
                                        <div class="col-md-2" style="padding:0px"> <button class="btn pull-right m-0"
                                                onclick="decrease({{$booking->sub_cat_details_id}})"><i
                                                    class="fa fa-minus"></i></button>
                                        </div>
                                        <div class="col-md-4" style="padding:0px"> <input type="text"
                                                class="form-control text-center" aria-label="Small"
                                                aria-describedby="inputGroup-sizing-sm"
                                                data-service_id="{{$booking->sub_categories_id}}"
                                                id="qty{{$booking->sub_cat_details_id}}" placeholder="Qty"
                                                value="{{$booking->quantity}}"> </div>
                                        <div class="col-md-2 " style="padding:0px"> <button class="btn pull-left"
                                                onclick="increase({{$booking->sub_cat_details_id}})"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <button class="btn btn-primary edit_service" data-id="{{$booking->id}}"><i
                                            class="fa fa-pencil"></i></button>
                                    @if(count($order->bookings) > 1)
                                    <button class="btn btn-danger deleteServiceBit"
                                        data-service_id="{{$booking->sub_categories_id}}"
                                        data-id="{{$booking->sub_cat_details_id}}"><i class="fa fa-times"></i></button>
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="" id="service_box" style="overflow: auto !important;padding: 10px 25px 11px 10px;"> </div>

                <button class="btn btn-primary" id="add_new_service">Add New Services</button>
                @if ($order->status == '0' || $order->status == '1')
                <form action="{{route('order.cancel')}}" method="POST" >
                    @csrf
                    <input type="text" name="id" value="{{$order->id}}" hidden>
                    <button class="btn btn-danger pull-right" id="add_new_service">Cancel Order</button>
                </form>
                @endif

            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
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

<script>
    $('.edit_service').click(function(){
    if($(this).hasClass('active')){
        $(this).html('<i class="fa fa-pencil"></i>');
        $(this).removeClass('active');
        // $('.quantity_edit'+$id).hide();
        // $('.only_quantity'+$id).show();
        location.reload();
    }else{
        $(this).addClass('active');
        $id = $(this).data('id');
        $('.quantity_edit'+$id).show();
        $('.only_quantity'+$id).hide();

        $(this).html('<i class="fa fa-check"></i>');
    }
});

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

        function qtyUpdate(id, qty , service_id) {
            jQuery.ajax({
                url: "{{route('update.qty')}}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "service_id": service_id,
                    "id": id,
                    "qty": qty,
                    "order_id": {{$order->id}}
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

           // grand_total_price();
        }


    $('.deleteServiceBit').click(function(){
        $service_id = $(this).data('service_id');
        $id = $(this).data('id');
        $.ajax({
            url: "{{route('admin.order.delServiceBit')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": $service_id,
                "id": $id,
                "order_id": {{$order->id}}
            },
            dataType: 'json',
            success: function(response) {
                    location.reload();
            }
        });
    })

    $('#add_new_service').click(function(){
        $cat_id = {{$order->category_id}};
        $.ajax({
                type: "GET",
                url: "{{asset('/')}}/admin/service_show/"+$cat_id,
                dataType: 'json',
                success: function(data) {
                    for($i=0; $i < data.length; $i++){
                       // console.log(data[$i].name);
                        $output = ' <div class="col-md-12" style="border:1px solid #c2cad8;padding-right: 0px;"> <div class="row"><span class="col-md-6" style="padding:5px">'+data[$i].name+'</span><button type="button" data-id="'+data[$i].id+'" class="btn btn-primary float-right services" onclick="serviceSelect('+data[$i].id+')">Add</button></div><hr style="margin:0px" > <div class="row"><div class="col-md-10 col-md-offset1" id="service_section'+data[$i].id+'"></div></div></div>';

                        $('#service_box').addClass("thumbnail");
                        $('#service_box').append($output);
                    }
                    
                }
            })
    });

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
                "order_id": {{$order->id}}
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

        // grand_total_price();
        }

    $('.service_add_finish').click(function(){
        location.reload();
    });
</script>


@endsection