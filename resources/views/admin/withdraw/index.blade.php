@extends('admin.cms.template')
@section('body')

<h1 class="page-title">Cash Out
    Request
    <small></small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif @endforeach

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Cash Out Request
                </div>
                <a href="#" data-toggle="modal" data-target="#withdraw_import" style="margin-top: 3px;"
                    class="btn btn-default float-right pt-2">Mass Import</a>
                <a href="{{route('admin.withdraw.export')}}" style="margin-top: 3px;"
                    class="btn btn-default float-right pt-2">Export CSV</a>
            </div>

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>User Type</th>
                            <th>Amount</th>
                            <th>MFS Number</th>
                            <th>MFS Type</th>
                            <th>Details</th>
                            {{-- <th class="align-center">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if($WithDrawAll)
                        @foreach ($WithDrawAll as $withdraw)
                        <tr>
                            <td>{{ $withdraw->user ? $withdraw->user->name : '-'}}</td>
                            <td> @if($withdraw->type == 'rp' ) User @else Service Provider @endif</td>
                            <td>{{ $withdraw->amount}}</td>
                            <td>{{ $withdraw->mfs_number}}</td>
                            <td>{{ $withdraw->type}}</td>
                            <td>{{ $withdraw->details}}</td>
                            {{-- <td class="align-center">
                                <button data-toggle="modal" data-target="#manual_accept"   
                                    class="btn btn-primery">Accept</button>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$WithDrawAll->links()}}

               

            </div>
        </div>

    </div>
</div>





<div class="modal fade" id="withdraw_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{route('admin.withdraw.import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="status">Upload CSV File</label>
                        <input type="file" name="withdraw_file" class="form-control">
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


{{-- <div class="modal fade" id="manual_accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    
                </form>
                <form action="{{route('admin.withdraw.approve')}}" method="POST">
                    @csrf
                    <input type="text" value="{{ $withdraw ? $withdraw->id : '-'}}" name="id" hidden>
                        <input type="text" value="1" name="status" hidden>
                    <div class="form-group">
                        <label for="number">MFS Number</label>
                        <input type="text" name="number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="trxno">Txn No.</label>
                        <input type="text" name="trxno" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@endif

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Cash Out History
        </div>
    </div>

    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Txn No.</th>
                    <th>Date</th>
                    {{-- <th class="align-center">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @if($WithDrawHistory)
                @foreach ($WithDrawHistory as $withdraw)
                <tr>
                    <td>{{ $withdraw->user ? $withdraw->user->name : '-'}}</td>
                    <td>{{ $withdraw->amount}}</td>
                    <td>{{ $withdraw->trxno}}</td>
                    <td>{{ $withdraw->updated_at}}</td>
                    {{-- <td class="align-center">
                        <button data-toggle="modal" data-target="#manual_accept"   
                            class="btn btn-primery">Accept</button>
                    </td> --}}
                </tr>
                
                @endforeach
                @endif
            </tbody>
        </table>
        {{$WithDrawHistory->links()}}
    </div>
</div>
@endsection