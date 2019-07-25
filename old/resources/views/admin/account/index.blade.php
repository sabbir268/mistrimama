@extends('admin.cms.template')
@section('body')

<h1 class="page-title">Accounts
    <small></small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
        @endforeach

        <button class="btn btn-primary" data-target="#newTransactionModal" data-toggle="modal">New Entry </button>
        <br>
        <br>

        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>All Accounts Transaction</div>
            </div>

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>SL</th>
                            <th>Transaction Date</th>
                            <th>Entry Date</th>
                            <th>Type</th>
                            <th>Heading</th>
                            <th>Details</th>
                            <th>Amount</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if ($accounts)
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($accounts as $account)
                        <tr>
                            <td>{{$i}} @php $i++ @endphp </td>
                            <td>{{$account->date}}</td>
                            <td>{{$account->created_at}}</td>
                            <td>{{$account->type }}</td>
                            <td>{{$account->heading }}</td>
                            <td>{{$account->details }}</td>
                            <td>{{$account->amount}}</td>
                            <td>{{$account->status}}</td>
                            {{-- <td class="align-center">
                                <a href="#" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
                                <a href="#" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$accounts->links()}}

                @endif

            </div>
        </div>
    </div>
</div>


{{-- modal sectitin --}}


<div class="modal fade" id="newTransactionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.accounts.insert')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="debit">Expenses</option>
                            <option value="credit">Revenue</option>
                        </select>
                    </div>

                    <div class="form-group" id="expenses">
                        <label for="status">Expenses Hedings</label>
                        <select name="heading" id="heading" class="form-control">
                            @foreach ($headingsExpence as $head)
                            <option value="{{$head->title}}">{{$head->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="revenue" style="display:none">
                        <label for="status">Revenue Hedings</label>
                        <select name="heading" id="heading" class="form-control">
                            @foreach ($headingsRevenue as $head)
                            <option value="{{$head->title}}">{{$head->title}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="status">Amount</label>
                        <input type="number" class="form-control" name="amount">
                    </div>

                    <div class="form-group">
                        <label for="status">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="check">Check</option>
                            <option value="bank">Bank</option>
                            <option value="other">Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Details</label>

                        <textarea class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Date</label>
                        <input type="date" class="form-control" name="date">
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
<script>
    $('#status').change(function(){
        if($(this).val() == 'credit'){
            $('#expenses').hide();
            $('#revenue').show();
        }else{
            $('#expenses').show();
            $('#revenue').hide();
        }
    })
</script>
@endsection