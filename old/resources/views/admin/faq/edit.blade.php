@extends('admin.home.template')
@section('body')
<h1 class="page-title">Role
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update How  It Work</div>
            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['faq.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">
                     <div class="form-group">
                        <label class="col-md-3 control-label">Type</label>
                        <div class="col-md-9">
                            {!! Form::select('type',getFaqType() ,null, array( 'class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('type'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Question</label>
                        <div class="col-md-9">
                            {!! Form::text('question', null, array('placeholder' => 'Question','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('question'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Answer</label>
                        <div class="col-md-9">
                            {!! Form::textArea('answer', null, array('placeholder' => 'Answer','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('answer'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            {!! Form::select('status',[1=>'Active',0=>"Inactive"], null ,array('class' => 'form-control')) !!}
                            <span class="error"><?= $errors->first('status'); ?></span>
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
