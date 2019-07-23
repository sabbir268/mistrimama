@extends('admin.home.template')
@section('body')

    <h1 class="page-title"> Service Sub Category
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
                    {!! Form::open(array('route' => 'service-sub-category.store' ,'method'=>'POST','files' => true ,'class'=>'form-horizontal')) !!}
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category</label>
                                        <div class="col-md-9">
                                            {!! Form::select('c_id', $model,null, array('class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('c_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name</label>
                                        <div class="col-md-9">
                                            {!! Form::text('name', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Price</label>
                                        <div class="col-md-9">
                                            {!! Form::number('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('price'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Unit Remark</label>
                                        <div class="col-md-9">
                                            {!! Form::text('unit_remark', null, array('placeholder' => 'Unit Remark','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('unit_remark'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Additional Price</label>
                                        <div class="col-md-9">
                                            {!! Form::number('additional_price', null, array('placeholder' => 'Additional Price','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('additional_price'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            {!! Form::textArea('description', null, array('placeholder' => 'description','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
                                        </div>
                                    </div>
                                </div>

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
            $('.js-example-basic-multiple').select2();
        });
    </script>


@endsection
