@extends('admin.cms-attribute.template')

@section('body')

    <h1 class="page-title">CMS Attribute
        <small></small>
         <a href="{{ route('cms-attribute.create') }}" class="btn btn-primary float-right"> Create </a>
    </h1>
    <div class="row">
        <div class="col-md-12">

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage Pages Attribute</div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Pages</th>
                                <th>Title</th>
                                <th>type At</th>
                                <th>Value Name</th>
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                <td>{{ @$model->pages->title }}</td>
                                <td>{{ $model->name }}</td>
                                <td>{{ $model->type }}</td>
                                <td>{{ $model->url }}</td>


                                <td  class="align-center">
                                    <a class="btn btn-primary" href="{{ route('cms-attribute.edit',$model->id) }}">Edit</a>
                                      {!! Form::open(['method' => 'DELETE','route' => ['cms-attribute.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $models->appends(Input::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>



@endsection
