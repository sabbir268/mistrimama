@extends('admin.faq.template')

@section('body')

    <h1 class="page-title">FAQ's
        <small></small>
        <a href="{{ route('faq.create') }}" class="btn btn-primary float-right"> Create </a>
    </h1>
    <div class="row">
        <div class="col-md-12">
             
            

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage How It Works </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Type</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th class="align-center action-wraper">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                <td>
                                    {{ getFaqType($model->type) }}
                                </td>

                                <td>{{ $model->question }}</td>
                                <td>{{ str_limit($model->answer,100,"..")}}</td>
                                <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                                
                                <td  class="align-center">
                                    <div class="action-wraper">
                                    <a class="btn blue btn-xs" title="View" href="{{ route('faq.show',$model->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-xs" title="Edit" href="{{ route('faq.edit',$model->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['faq.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
                                    <button type="submit" class="btn red btn-xs"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                                    </div>
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
