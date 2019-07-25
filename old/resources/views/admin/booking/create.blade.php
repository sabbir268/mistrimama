@extends('admin.home.template')
@section('body')
<h1 class="page-title">CMS
    <small></small>
</h1>
<div class="row">    
    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Create 
                </div>
            </div>
            <div class="portlet-body form">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif









                {!! Form::open(array('route' => 'cms.store', 'files' => true ,'method'=>'POST','class'=>'form-horizontal')) !!}







                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Title</label>
                        <div class="col-md-9">
                            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('title'); ?></span>
                        </div>
                    </div>
                    <!--                     <div class="form-group">
                                            <label class="col-md-3 control-label">Slug</label>
                                            <div class="col-md-9">
                                                {!! Form::text('url', null, array('placeholder' => 'Slug','class' => 'form-control')) !!}
                                                <span class="bg-danger"><?= $errors->first('url'); ?></span>
                                            </div>
                                        </div>-->

                    <div class="form-group">
                        <label class="col-md-3 control-label">Description </label>
                        <div class="col-md-9">
                            {!! Form::textArea('description', null, array('placeholder' => 'content','id'=>'description', 'class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">        
                        <label class="col-md-3 control-label">SEO Setting</label>
                        <div class="col-md-9">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">SEO Setting</legend>
                                <div class="col-md-12">


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Meta Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('meta_title', null, array('placeholder' => 'Meta Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('meta_title'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Meta Keyword</label>
                                        <div class="col-md-9">
                                            {!! Form::text('meta_keyword', null, array('placeholder' => 'Meta Keywords','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('meta_keyword'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Meta Description</label>
                                        <div class="col-md-9">
                                            {!! Form::text('meta_description', null, array('placeholder' => 'Meta Description','class' => 'form-control')) !!}
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
