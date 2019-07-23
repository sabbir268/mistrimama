@extends('admin.cms.template') 
@section('body')

<h1 class="page-title">Withdraw Request
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
                        <i class="fa fa-cogs"></i>Withdraw Request</div>
                </div>
        
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Name</th>
                                <th>User Type</th>
                                <th>Amount</th>
                                <th>MFS Number</th>
                                <th>Details</th>
                                <th class="align-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($WithDrawAll)
                            @foreach ($WithDrawAll as $withdraw)
                            <tr>
                                <td>{{ $withdraw->user ? $withdraw->user->name : '-'}}</td>
                                <td> @if($withdraw->type == 'rp' ) User @else Service Provider @endif</td>
                                <td>{{ $withdraw->amount}}</td>
                                <td>{{ $withdraw->mfs_number}}</td>
                                <td>{{ $withdraw->details}}</td>
                                <td class="align-center">
                                    <button class="btn btn-primery">Accept</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$WithDrawAll->links()}}

                    @endif
                    
                </div>
            </div>
    </div>
</div>
@endsection