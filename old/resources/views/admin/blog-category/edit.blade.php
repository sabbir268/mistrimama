@extends('admin.home.template')
@section('body')
<link href="{{ asset('/admin/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/admin/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>

<h1 class="page-title">Blog Category
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Blog Category</div>

            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['blog-category.update', $model->id], 'class'=>'form-horizontal']) !!}


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
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-9">
                            {!! Form::file('image', null, array('placeholder' => 'image','class' => 'form-control', 'accept'=>"image/*")) !!}
                            <span class="bg-danger"><?= $errors->first('image'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            {!! Form::textArea('description', null, array('placeholder' => 'description','id'=>'description','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
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

</div>

@endsection
