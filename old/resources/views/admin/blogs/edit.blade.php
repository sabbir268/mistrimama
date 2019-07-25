@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Blogs
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Blogs </div>

            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['blogs.update', $model->id], 'class'=>'form-horizontal']) !!}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                
                
                
                 <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('title'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Url</label>
                        <div class="col-md-9">
                            {!! Form::text('url', null, array('placeholder' => 'url','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('url'); ?></span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category</label>
                        <div class="col-md-9">
                            {!! Form::select('category_id',$category, null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('category_id'); ?></span>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-9">
                            {!! Form::file('image', null, array('placeholder' => 'image','class' => 'form-control', 'accept'=>"image/*")) !!}
                            <span class="bg-danger"><?= $errors->first('image'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Content</label>
                        <div class="col-md-9">
                            {!! Form::textArea('content', null, array('placeholder' => 'content','id'=>'description','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('content'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
                        </div>
                    </div>




                    <div class="form-group">        
                         <label class="col-md-3 control-label">SEO Setting</label>
                        <div class="col-md-9">
                        
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border label label-sm label-success">SEO Setting</legend>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-12  ">Meta Title</label>
                                    <div class="col-md-12">
                                        {!! Form::text('meta_title', null, array('placeholder' => 'Meta Title','id'=>'description','class' => 'form-control')) !!}
                                        <span class="bg-danger"><?= $errors->first('meta_title'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12  ">Meta Keyword</label>
                                    <div class="col-md-12">
                                        {!! Form::text('meta_keyword', null, array('placeholder' => 'Meta Keyword','class' => 'form-control')) !!}
                                        <span class="bg-danger"><?= $errors->first('meta_keyword'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12  ">Meta Description</label>
                                    <div class="col-md-12">
                                        {!! Form::textArea('meta_description', null, array('placeholder' => 'Meta Description','id'=>'description','class' => 'form-control')) !!}
                                        <span class="bg-danger"><?= $errors->first('meta_description'); ?></span>
                                    </div>
                                </div>
                                
                            </div>

                             

                        </fieldset>
                     
                        </div>


                    </div>


                </div>
                
                
                 
                
                
                
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->

</div>
<script>
    $(document).ready(function () {
        $('#checkedAll').on('ifChecked ifUnchecked', function (event) {
            if (event.type == 'ifChecked') {
                $('input.checkSingle').iCheck('check');
            } else {
                $('input.checkSingle').iCheck('uncheck');
            }
        });

        $('input.checkSingle').on('ifChanged', function (event) {
            if ($('input.checkSingle').filter(':checked').length == $('input.checkSingle').length) {
                $('#checkedAll').prop('checked', 'checked');
            } else {
                $('#checkedAll').removeProp('checked');
            }
            $('#checkedAll').iCheck('update');
        });

    });
</script>


<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: "{{ url('/laravel-filemanager?type=Images') }}",
        filebrowserImageUploadUrl: "{{ url('/laravel-filemanager/upload?type=Images&_token=') }}",
        filebrowserBrowseUrl: "{{ url('/laravel-filemanager?type=Files') }}",
        filebrowserUploadUrl: "{{ url('/laravel-filemanager/upload?type=Files&_token=') }}"
    };
    CKEDITOR.replace('description', options);
</script>




@endsection
