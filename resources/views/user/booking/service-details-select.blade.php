<ul class="list-group list-group-flush pt-2 pl-4 pr-4">
    <input type="text" value="{{$service_id}}" id="service_id" name="service_id" hidden>
    @if ($SubServicesSelected)
    @foreach ($SubServicesSelected as $SubType)
    <li class="list-group-item border-0" id="main-carear-{{$SubType->sub_cat_details_id}}">
        <div class="row">
            <div class="mb-0 col-md-7">
                {{-- <input type="checkbox" class="serviceType" value="{{$SubType->sub_cat_details_id}}"
                id="check-bird-{{$SubType->sub_cat_details_id}}"> --}}
                <label for="">{{$SubType->service_details_name}}</label>
            </div>
            <div id="qtyCont" class="col-md-5" style="display:block;padding-left:57px">
                <div class="input-group input-group-sm pl-5 ml-5">
                    <span style="cursor :pointer"
                        class="input-group-text pl-3 pr-3 pt-1 pb-0 btn-mm rounded-0 mr-0 decrease"
                        data-id="{{$SubType->sub_cat_details_id}}" data-service="{{$service_id}}">
                        <i class="fa fa-minus"></i></span>

                    <span class="mr-0 " style="border: 1px solid #f3b400 !important">
                        <input type="text" value="{{$SubType->quantity}}" style="width:35px" class="pb-1 text-dark border-mm text-center border-0" name="qty"
                            placeholder="Qty" id="qty{{$SubType->sub_cat_details_id}}" data-service="{{$service_id}}">
                    </span>

                    <span style="cursor :pointer"
                        class="input-group-text pl-3 pr-3 pt-1 pb-0 btn-mm text-white mr-0 rounded-0 increase"
                        data-id="{{$SubType->sub_cat_details_id}}" data-service="{{$service_id}}"><i class="fa fa-plus"></i>
                    </span>

                    <span style="cursor :pointer" class="bg-danger ml-3 p-1 text-white mr-0 rounded-0 remove-item"
                        data-id="{{$SubType->sub_cat_details_id}}" data-order_id ="{{$SubType->order_id}}" data-service="{{$service_id}}"><i class="fa fa-times"></i>
                    </span>
                </div>
            </div>
        </div>
    </li>

    @endforeach
    @endif
</ul>

<script>
    $('.serviceType').click(function() {
        $id = $(this).val();
        $service_id = $('#service_id').val();
        $qty = $('#qty' + $id).val();
        if ($(this).is(':checked')) {
            $('#qtyCont-' + $id).show();
            addSubServices($service_id, $id, $qty);
        } else {
            $('#qty'+$id).val(1);
            $('#qtyCont-'+$id).hide();
            delSubServices($service_id, $id, $qty);
        }
    });

    function addSubServices(service_id, id, qty) {
        $.ajax({
            url: "{{route('add.sub-service')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": service_id,
                "id": id,
                "qty": qty
            },
            dataType: 'html',
            success: function(response) {
                if (response == 'done') {
                    $('#addRemove' + id).html('ADD');
                } else {
                    $('.grand_total').text(response);
                }
            }
        });
    }

    function delSubServices(service_id, id, qty) {
        $.ajax({
            url: "{{route('delete.sub-service')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": service_id,
                "id": id,
                "qty": qty
            },
            dataType: 'html',
            success: function(response) {
                if (response == 'done') {
                    $('#addRemove' + id).html('ADD');
                } else {
                    $('.grand_total').text(response);
                }
            }
        });
    }

    function qtyUpdate(id, qty) {
        $service_id = $('#service_id').val();
        $.ajax({
            url: "{{route('update.qty')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": $service_id,
                "id": id,
                "qty": qty
            },
            dataType: 'html',
            success: function(response) {
                // if(!isNaN(response)){
                // $('.grand_total').text(response);
                // }else{
                //     addSubServices($id , $qty);
                // }
                $.ajax({
                    url: "{{route('order.total_price')}}",
                    type: 'get',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#grand_total').html(response);
                    }
                });
            }
        });
    }



    $(".decrease").click(function() {
        $id = $(this).data('id');
        $qty = $('#qty' + $id).val();
        if ($qty != 1) {
            $qty--;
        }
        $('#qty' + $id).val($qty);

        qtyUpdate($id, $qty);
    });

    $(".increase").click(function() {
        $id = $(this).data('id');
        $qty = $('#qty' + $id).val();
        $qty++;
        $('#qty' + $id).val($qty);

        qtyUpdate($id, $qty);
    });

    $(".remove-item").click(function() {
        $id = $(this).data('id');
        $service_id = $(this).data('service');
        
        $qty = $('#qty'+$id).val();
        $order_id = $(this).data('order_id');

        $.ajax({
            url: "{{route('delete.sub-service')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": $service_id,
                "id": $id,
                "qty": $qty,
                "order_id": $order_id
            },
            dataType: 'html',
            success: function(response) {
                if(response == 0){
                    jQuery('#addRemove' + $service_id).html('ADD');
                    // jQuery('#collapsePanel' + $service_id).html(response);
                    jQuery('#collapsePanel' + $service_id).hide();
                    $('#qty'+$id).val(1);
                }
                $('#main-carear-'+$id).hide();
                $.ajax({
                    url: "{{route('order.total_price')}}",
                    type: 'get',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#grand_total').html(response);
                    }
                });
            }
        });

    });
    
</script>