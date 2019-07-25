@extends('admin.blog-category.template')

@section('body')

    <h1 class="page-title">Blog Category
        <small></small>
        
        <a href="{{ route('blog-category.create') }}" class="btn btn-primary float-right"> Create </a>
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



                            {!! Form::open(['method'=>'GET','url'=>route('blog-category.index'),'class'=>'form-horizontal','role'=>'search'])  !!}

                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Name</label>                    
                                        <div class="col-md-7">
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                     

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="Candidates_phone2">Display Name</label>                    
                                        <div class="col-md-7">
                                            {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
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
                        <i class="fa fa-cogs"></i>Manage Blog Category </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Url</th>
                                <th class="align-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                
                                <td>{{ $model->title }}</td>
                                <td><img width="150px" src='{{ asset("images/blog-category/".$model->image) }}'></td>
                                <td>{{ $model->url }}</td>
                                <td  class="align-center">
                                    <a class="btn btn-info" href="{{ route('blog-category.show',$model->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('blog-category.edit',$model->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['blog-category.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]) !!}
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
