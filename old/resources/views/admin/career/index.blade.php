@extends('admin.cms.template') 
@section('body')
<h1 class="page-title">Career
    <small></small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Career </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Years of Experience</th>
                            <th>Salary Expectation</th>
                            <th>Download CV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;?>
                        @foreach ($career_data as $data)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{ $data->first_name }}</td>
                            <td>{{ $data->last_name}}</td>
                            <td>{{ $data->phone_number }}</td>
                            <td>{{ $data->email}}</td>
                            <td>{{ $data->year_of_experience}}</td>
                            <td>{{ $data->salary_expectation}}</td>
                            <td>
                                <a href="{{url('career_uploads')}}/{{$data->cv}}">download</a>
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