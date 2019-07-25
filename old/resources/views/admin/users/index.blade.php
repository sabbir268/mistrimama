@extends('admin.home.template')

@section('body')

<h1 class="page-title">Users


    <small></small>

</h1>
<div class="row">
    <div class="col-md-12">



        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Users</div>

            </div>


            <div class="portlet-body flip-scroll">






                <table  class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $u)

                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->phone_no }}</td>
                            <td>{{ $u->address }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

















                
            </div>
        </div>
    </div>
</div>


<style>
    .portlet-body table .logoWrap{
        width: 80px;
        height: 80px;
        vertical-align: middle;
    }
    .portlet-body table .logoWrap img{
        width: 100%;
    }


    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
</style>

@endsection
