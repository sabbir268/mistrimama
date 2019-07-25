@extends('admin.users.template')

@section('body')
<h1 class="page-title">User
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>User Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Name </th>
                            <td>{{ $users->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $users->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $users->phone ?></td>
                        </tr>

                        <tr>
                            <th>DOB</th>
                            <td>{{ $users->dob}}</td>
                        </tr>
                        <tr>
                            <th>Street</th>
                            <td>{{ $users->street }}</td>
                        </tr><tr>
                            <th>Locality</th>
                            <td>{{ $users->locality }}</td>
                        </tr>
                        <tr>
                            <th>Town</th>
                            <td>{{ $users->town}}</td>
                        </tr>
                        <tr>
                            <th>Postcode</th>
                            <td>{{ $users->postcode}}</td>
                        </tr>
                    </tbody>
                </table>



                <div class="form-actions right">
                    <a class="btn green" href="{{ route('editprofile',$users->id) }}">Edit</a>
                </div>
            </div>

        </div>

        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>

@endsection
