@extends('admin.home.template')
@section('body')

<h1 class="page-title">Service Provider
    <small></small>

</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Service Provider </div>
            </div>
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-8">
                        {{$ServiceProviders->links()}}
                    </div>
                    {{-- <div class="col-md-3" style="display:block">
                        <form action="">
                            <div class="form-group" style="margin:0px">
                                <div class="col-sm-9" style="padding:0px">
                                    <select name="area" class="form-control">
                                        @foreach ($area as $ar)
                                        <option value="{{$ar->id}}">{{$ar->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div> --}}
                    <div class="col-md-4">
                        <form action="{{route('admin.sp.search')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="col-sm-9" style="padding:0px">
                                    <input type="text" name="search" placeholder="Phone Number, Name............." class="form-control">
                                </div>
                                <button style="padding: 6px 0px;border-color: #337ab7;margin-top: 0px;"
                                    class="control-label btn btn-primary col-sm-3" for="search"> <i
                                        class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Phone Number</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Total Comrades</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($ServiceProviders as $p)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->sp_code}}</td>
                            <td>@if($p->type==0) ESP @else FSP @endif</td>
                            <td>{{$p->phone_no}}</td>
                            <td>
                                @if($p->category )
                                @foreach ($p->category as $cat)
                                <li>{{$cat->category->name}}</li>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if($p->u_id == null)
                                <a href="{{url('activate/provider/'.$p->id)}}" data-toggle="tooltip"
                                    data-title="Click To Activate" class="btn btn-success">Activate </a> @else
                                <a href="{{url('deactivate/provider/'.$p->id)}}" data-toggle="tooltip"
                                    data-title="Click To De-Activate" class="btn btn-danger">De-Activate </a> @endif
                            </td>
                            <td>{{$p->comrads ? count($p->comrads) : 0}}</td>
                            <td>
                                <a href="{{route('service-provider.show',$p->id)}}" class="btn btn-info">Profile</a>
                                @if(checkRole(auth()->user()->id, 'admin'))
                                <button class="btn btn-success" data-toggle="modal"
                                    data-target="#addAmountMdl{{$p->id}}">Add
                                    Amount</button>
                                @endif
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach($ServiceProviders as $p)
<div class="modal fade" id="addAmountMdl{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add MM Starting Balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.mmfirstbalance')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Amounts</label>
                        <input type="text" name="user_id" value="{{$p->u_id}}" hidden>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount"
                            required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
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
@endsection