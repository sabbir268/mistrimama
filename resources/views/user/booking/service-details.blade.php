<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service Option</h5>
                <button type="button" class="close nextOpt" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <input type="text" value="{{$service_id}}" id="pservice_id" name="service_id" hidden>
                            @if ($SubServicesType)
                            @foreach ($SubServicesType as $SubType)
                            <li class="list-group-item">
                                <div class="row" style="border-bottom: 2px solid #fff;margin-bottom: 12px">
                                    <div class="checkbox-bird orange mb-0 col-md-8">
                                        <input type="checkbox" class="serviceType" value="{{$SubType->id}}"
                                            id="check-bird-{{$SubType->id}}">
                                        <label for="check-bird-{{$SubType->id}}">{{$SubType->name}}</label>
                                    </div>
                                    <div id="qtyCont-{{$SubType->id}}" class="col-md-4" style="display:none;">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text btn-mm decrease" style="cursor :pointer"
                                                    data-id="{{$SubType->id}}" id="inputGroup-sizing-sm"><i
                                                        class="fa fa-minus"></i></span>
                                            </div>
                                            <input type="text" class="form-control text-center" aria-label="Small"
                                                aria-describedby="inputGroup-sizing-sm" placeholder="Qty"
                                                id="qty{{$SubType->id}}" value="1">
                                            <div class="input-group-append ">
                                                <span class="input-group-text btn-mm text increase"
                                                    style="cursor :pointer" data-id="{{$SubType->id}}"
                                                    id="inputGroup-sizing-sm"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer row p-0 m-0">
                {{-- <div class="row"> --}}

                <div class="col-md-4 text-left p-0 m-0 pt-2 pl-2">
                    <ul class="remarks">
                    </ul>
                </div>
                <div class="col-md-8 text-right p-0 m-0 pt-3 pr-2">
                    <button class="btn btn-secondary ">Approx. Price:<span class="sub_total">0</span></button>
                    <button type="button" class="btn btn-mm nextOpt" id="nextOpt" data-dismiss="modal">Next
                        →</button>
                </div>

                <div class="col-md-12 offset-md-1 pull-left m-1 brief ">

                </div>
                {{-- </div> --}}

            </div>
        </div>
    </div>
</div>

<script>
    jQuery('.serviceType').click(function() {
        $id = jQuery(this).val();
        $service_id = jQuery('#pservice_id').val();
        $qty = jQuery('#qty' + $id).val();
        if (jQuery(this).is(':checked')) {
            jQuery('#qtyCont-' + $id).show();
            addSubServices($service_id, $id, $qty);
        } else {
            jQuery('#qty'+$id).val(1);
            jQuery('#qtyCont-' + $id).hide();
            delSubServices($service_id, $id, $qty);
        }
    });

    function addSubServices(service_id, id, qty) {
        jQuery.ajax({
            url: "{{route('add.sub-service')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": service_id,
                "id": id,
                "qty": qty,
                "order_id": {{$order_id}}
            },
            dataType: 'html',
            success: function(response) {
                if (response == 'done') {
                    jQuery('#addRemove' + id).html('ADD');
                } else {
                    var data = JSON.parse(response);
                    jQuery('.sub_total').html(data.total_price);
                    // var rm = data.unit_remarks
                    // for(var i = 0; i < rm.length; i++){
                    //     var remarks = '<li>'+rm[i]+'</li>';
                    // }
                    jQuery('.remarks').html('');
                    jQuery('.remarks').append('<li><span id="unit_point">'+data.unit_remarks+'</span> '+data.unit_type+'</li>');
                    // jQuery('.brief').html('');
                    jQuery('.brief').html('<span class="p-2 d-block">'+data.brief+'</span>');
                }
            }
        });
    }

    function delSubServices(service_id, id, qty) {
        jQuery.ajax({
            url: "{{route('delete.sub-service')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": service_id,
                "id": id,
                "qty": qty,
            },
            dataType: 'html',
            success: function(response) {
                jQuery('.sub_total').html('0');
                jQuery('.remarks').html('');
                jQuery('.brief').html('');
                if (response == 'done') {
                    jQuery('#addRemove' + id).html('ADD');
                }
            }
        });
    }

    function qtyUpdate(id, qty) {
        $service_id = jQuery('#pservice_id').val();
        jQuery.ajax({
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
                    var data = JSON.parse(response);
                    jQuery('.sub_total').text(data.total_price);
                    $up = parseInt($('#unit_point').html());
            
                    $upp = qty * parseInt(data.unit_point_adtnl);
                    $('#unit_point').html('');
                    $('#unit_point').html($upp);
                // }else{
                //     addSubServices($id , $qty);
                // }
            }
        });
    }



    jQuery(".decrease").click(function() {
        $id = jQuery(this).data('id');
        $qty = jQuery('#qty' + $id).val();
        if ($qty != 1) {
            $qty--;
        }
        jQuery('#qty' + $id).val($qty);

        qtyUpdate($id, $qty);
    });

    jQuery(".increase").click(function() {
        $id = jQuery(this).data('id');
        $qty = jQuery('#qty' + $id).val();
        $qty++;
        jQuery('#qty' + $id).val($qty);

        qtyUpdate($id, $qty);
    });

    jQuery('.nextOpt').click(function() {
        $service_id = jQuery('#pservice_id').val();
        jQuery.ajax({
            url: "{{route('selected.sub-service')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "service_id": $service_id,
                "order_id": {{$order_id}}
            },
            dataType: 'html',
            success: function(response) {
                console.log(response);
                if(response != 0){
                    jQuery('#addRemove' + $service_id).html('ADDED');
                    jQuery('#addRemove' + $service_id).removeClass('bg-success');
                    jQuery('#addRemove' + $service_id).addClass('bg-info');
                    jQuery('#collapsePanel' + $service_id).html(response);
                    jQuery('#collapsePanel' + $service_id).show();
                }
            }
        });

        jQuery.ajax({
            url: "{{route('order.total_price')}}",
            type: 'get',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'html',
            success: function(response) {
                jQuery('#grand_total').html(response);
            }
        });

        
    });
</script>