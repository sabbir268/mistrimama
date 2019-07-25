@extends('admin.cms-attribute.template')
@section('body')

<h1 class="page-title">Page Attributes
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Page Attributes </div>

            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['cms-attribute.update', $model->id], 'class'=>'form-horizontal']) !!}
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
                        <label class="col-md-3 control-label">Pages</label>
                        <div class="col-md-9">
                            {!! Form::select('page_id', $allPages,null,array( 'class' => 'form-control')) !!}

                            <span class="bg-danger"><?= $errors->first('page_id'); ?></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Type</label>
                        <div class="col-md-9">
                            {!! Form::select('type', getPagesAttribute(),null,array( 'class' => 'form-control')) !!}

                            <span class="bg-danger"><?= $errors->first('type'); ?></span>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Unique Slug</label>
                        <div class="col-md-9">
                            {!! Form::text('url', null, array('placeholder' => 'Slug','class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('url'); ?></span>
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





@endsection
