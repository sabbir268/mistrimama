@extends('admin.home.template')
@section('body')
<h1 class="page-title">Update Referenzen
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Referenzen</div>
            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['service-category.update', $model->id], 'class'=>'form-horizontal']) !!}
                <div class="form-body">

                    <div class="form-group">        




                        <div class="col-md-12">


                            <div class="form-group">
                                <label class="col-md-3 control-label">Title</label>
                                <div class="col-md-9">
                                    {!! Form::text('name', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('name'); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">main_image</label>
                                <div class="col-md-9">
                                    {!! Form::text('main_image', null, array('placeholder' => 'main_image','class' => 'form-control',"onclick" => "openKCFinder(this)")) !!}
                                    <span class="bg-danger"><?= $errors->first('main_image'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">icon_image</label>
                                <div class="col-md-9">
                                    {!! Form::text('icon_image', null, array('placeholder' => 'icon_image','class' => 'form-control',"onclick" => "openKCFinder(this)")) !!}
                                    <span class="bg-danger"><?= $errors->first('icon_image'); ?></span>
                                </div>
                            </div>


                         


                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('description', null, array('placeholder' => 'Description','id'=>'description','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('description'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Unique Benefits</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('unique_benefits', null, array('placeholder' => 'unique_benefits','id'=>'unique_benefits','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('unique_benefits'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Service Category</label>
                                <div class="col-md-9">
                                    {!! Form::textarea('service_category', null, array('placeholder' => 'service_category','id'=>'service_category','class' => 'form-control')) !!}
                                    <span class="bg-danger"><?= $errors->first('service_category'); ?></span>
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
    CKEDITOR.replace('description', options);
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


