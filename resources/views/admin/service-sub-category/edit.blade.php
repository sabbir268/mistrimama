@extends('admin.home.template')
@section('body')
    <h1 class="page-title">Update Service Sub Category
        <small></small>
    </h1>
    <div class="row">

        <div class="col-md-12 ">
            <div class="portlet box green ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> Update Service Sub Category
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['service-sub-category.update', $model->id], 'class'=>'form-horizontal']) !!}
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category</label>
                                        <div class="col-md-9">
                                            {!! Form::select('c_id', $category,null, array('class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('c_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name</label>
                                        <div class="col-md-9">
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
                                            {!! Form::textArea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
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
    </div>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: "{{ url('/laravel-filemanager?type=Images') }}",
            filebrowserImageUploadUrl: "{{ url('/laravel-filemanager/upload?type=Images&_token=') }}",
            filebrowserBrowseUrl: "{{ url('/laravel-filemanager?type=Files') }}",
            filebrowserUploadUrl: "{{ url('/laravel-filemanager/upload?type=Files&_token=') }}"
        };

        CKEDITOR.replace('unique_benefits', options);
        CKEDITOR.replace('service_category', options);
    </script>

    <script>
        window.hasib = "hasib";

        function SetUrl(url) {
            window.hasib.value = url;

        }


        function openKCFinder(field) {
            window.hasib = field;
//    window.KCFinder = {
//        callBack: function(url) {
//            alert("asd");
//            field.value = url;
//            window.KCFinder = null;
//        }
//    };

            window.open('{{ url("/laravel-filemanager?type=Images") }}', 'kcfinder_textbox',
                'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600'
            );
        }
    </script>
@endsection


