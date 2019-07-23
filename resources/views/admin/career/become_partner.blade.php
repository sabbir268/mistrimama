@extends('admin.cms.template') 
@section('body')
<h1 class="page-title">Become partner
    <small></small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage become partner </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Service</th>
                            <th>Message</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;?>
                        @foreach ($become_partnerData as $data)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email}}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->company}}</td>
                            <td>{{ $data->serviceName}}</td>
                            <td>{{ $data->message}}</td>
                            <td>
                                <a href="{{url('admin/become-partner-delete')}}/{{$data->id}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                       </tr>
                  @endforeach
              </tbody>
          </table>
            </div>
        </div>
    </div>
</div>
@endsection