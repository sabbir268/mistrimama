@extends('admin.cms.template')
@section('body')

<h1 class="page-title">Recharge Request
    <small></small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
        @endforeach


        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>
                    All Recharge Request
                </div>
                
                <a href="#" data-toggle="modal" data-target="#recharge_import" style="margin-top: 3px;" class="btn btn-default float-right pt-2">Mass Import</a>
                <a href="{{route('admin.recharge.export')}}" style="margin-top: 3px;" class="btn btn-default float-right pt-2">Export CSV</a>
                
            </div>

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>SL</th>
                            <th>SP Name</th>
                            <th>SP Category</th>
                            <th>MFS</th>
                            <th>Trx. NO</th>
                            <th>Amount</th>
                            <th class="align-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($requests)
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($requests as $request)
                        <tr>
                            <td>{{$i}} @php $i++ @endphp </td>
                            <td>{{$request->user ? $request->user->sp->name : ''}}</td>
                            <td>
                                @if($request->user)
                                {{$request->user->sp->service_category == 20 ? 'Starter' : (($request->user->sp->service_category == 15) ? 'Expert' : 'Professional')  }}
                                @endif
                            </td>
                            <td>{{$request->mfs}}</td>
                            <td>{{$request->trxn }}</td>
                            <td>{{$request->amount}}</td>
                            <td class="align-center">
                                <div class="btn-group">
                                    @if($request->status == 0)
                                    <form action="{{route('admin.recharge.approve')}}" method="POST">
                                        @csrf
                                        <input type="text" value="{{$request->id}}" name="id" hidden>
                                        <input type="text" value="1" name="status" hidden>
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>

                                    <form action="{{route('admin.recharge.approve')}}" method="POST">
                                        @csrf
                                        <input type="text" value="{{$request->id}}" name="id" hidden>
                                        <input type="text" value="3" name="status" hidden>
                                        <button type="submit" class="btn btn-danger">Decline</button>
                                    </form>
                                    @endif


                                    @if($request->status == 1)
                                    <button type="submit" class="btn btn-success">Approved</button>
                                    @endif


                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$requests->links()}}

                @endif

            </div>
        </div>
    </div>
</div>


{{-- modal sectitin --}}


<div class="modal fade" id="recharge_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mass Import Recharge Request Data Cross macth</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.recharge.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="status">Upload CSV File</label>
                        <input type="file" name="recharge_file" class="form-control">
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

@endsection