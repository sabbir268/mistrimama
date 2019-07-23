@extends('admin.blogs.template')

@section('body')

    <h1 class="page-title">Blogs
        <small></small>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary float-right"> Create </a>
    </h1>
    <div class="row">
        <div class="col-md-12">
             
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box purple ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-search"></i> Search </div>
                            <div class="tools">
                                <a href="" class="<?= isset($_GET['advanceSearch']) ? "collapse" : "expand" ?>"><i class="icon-collapse"></i></a>
                            </div>
                        </div>
                        <div class="portlet-body form" style="display: <?= isset($_GET['advanceSearch']) ? "block" : "none" ?>">



                            {!! Form::open(['method'=>'GET','url'=>route('blogs.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Title</label>                    
                                        <div class="col-md-7">
                                            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                     

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="Candidates_phone2">Category</label>                    
                                        <div class="col-md-7">
                                            {!! Form::select('category_id',$category, null ,array('placeholder'=>'All','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                                                         


                                </div>
                                <div class="clearfix"></div>
                                <div class="form-actions" style="text-align: center">
                                    <input class="btn green" type="submit" name="advanceSearch" value="Search">            
                                </div>

                            </div>
                            {!! Form::close() !!}
                        </div><!-- search-form -->
                    </div>
                </div>
            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage Role </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th class="align-center">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                
                                <td>{{ $model->title }}</td>
                                <td><img width="200px" src='{{ asset("images/blogs/thumbnail/".$model->image) }}' ></td>
                                <td>{{ $model->category->title }}</td>
                                <td>{{ $model->url}}</td>
                                <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                                <td  class="align-center">
                                    <a class="btn btn-info" href="{{ route('blogs.show',$model->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('blogs.edit',$model->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['blogs.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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
