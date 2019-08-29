@if($SubCategory)
<div class="modal fade" id="all_services" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Serivces</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12" style="height:280px;overflow-y: scroll;">
                    @foreach($SubCategory as $data)
                    <div class="card mb-1 pl-3">
                        <div class="card-body ">
                            <input type="hidden" name="ID" value="{{$data->id}}">
                            <div class="row">
                                <div class="col-md-8">
                                    <div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse"
                                        data-target="#collapsePanel{{$data->id}}" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <h5 class="mb-0"> <span class="rounded-circle  text-mm  "><i
                                                    class="fa fa-cube"></i></span>
                                            {{$data->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center pt-2">
                                    <span style="cursor :pointer"
                                        class="bg-mm pl-3 pr-3 pt-1 pb-1 text-white ml-3 rounded addRemove"
                                        data-id="{{$data->id}}" id="addRemove{{$data->id}}">ADD</span>
                                </div>
                            </div>
                            <div class="row collapse mb-0 text-left" id="collapsePanel{{$data->id}}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" data-toggle="modal" data-target="#allocate-{{$order->id}}"
                data-item="{{ $order->id }}" class="btn btn-mm">Allocate</button> --}}
                <button type="button" class="btn btn-danger" id="new_service_add_done" data-dismiss="modal">Done</button>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    $('.addRemove').click(function() {
            $id = $(this).data('id');
            $order_id = {{$order_id}};
            $.ajax({
                url: "{{route('add.sub-service-details')}}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": $id,
                    "order_id": $order_id
                },
                dataType: 'html',
                success: function(response) {
                    $('#showModal2').html(response);
                    $('#exampleModal').modal({
                        show: true,
                        backdrop: 'static',
                        keyboard: false
                        });
                    
                }
            });
        });

        $('#new_service_add_done').click(function(){
            location.reload();
        })
</script>
@endif