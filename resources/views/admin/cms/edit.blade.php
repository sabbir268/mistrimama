@extends('admin.home.template')
@section('body')

<h1 class="page-title">Pages
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update Pages</div>

            </div>

            <div class="portlet-body form">
                {!! Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['cms.update', $model->id], 'class'=>'form-horizontal']) !!}
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
                        <label class="col-md-3 control-label">Description </label>
                        <div class="col-md-9">
                            {!! Form::textArea('description', null, array('placeholder' => 'content','id'=>'description', 'class' => 'form-control')) !!}
                            <span class="bg-danger"><?= $errors->first('description'); ?></span>
                        </div>
                    </div>


                              






                    <?php
                    foreach ($pagesAttribute as $attribute) {
                        //pr($attribute);
                        $i = $attribute->id;
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="Pages_description">
                                <?php echo $attribute->name; ?>
                            </label>
                            <div class="col-md-9">
                                <?php if ($attribute->type == 'image') { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::text("PagesAttribute[$i][value]", $attribute->value, array('class' => 'form-control',"onclick" => "openKCFinder(this)")) !!}
                                        </div>
                                        <!--                                                <div class="col-md-2">Alt Text</div>
                                                                                        <div class="col-md-5">
                                                                                            {!! Form::text("PagesAttribute[$i][alt_text]", $attribute->alt_text, array('class' => 'form-control')) !!}
                                                                                        </div>-->
                                    </div>
                                <?php } else if ($attribute->type == 'text' || $attribute->type == 'video') { ?>
                                    {!! Form::text("PagesAttribute[$i][value]", $attribute->value, array('class' => 'form-control')) !!}
                                <?php } else if ($attribute->type == 'editor') { ?>
                                    {!! Form::textArea("PagesAttribute[$i][value]", $attribute->value, array('class' => 'ckeditor')) !!}
                                <?php } ?>

                            </div>
                        </div>

                        <?php
                    }
                    ?>





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





                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->

</div>




<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: "{{ url('/laravel-filemanager?type=Images') }}",
        filebrowserImageUploadUrl: "{{ url('/laravel-filemanager/upload?type=Images&_token=') }}",
        filebrowserBrowseUrl: "{{ url('/laravel-filemanager?type=Files') }}",
        filebrowserUploadUrl: "{{ url('/laravel-filemanager/upload?type=Files&_token=') }}",
        
    };

   options.format_tags = 'p;h1;h2;h3;h4;h5;h6;pre;address;div';

    CKEDITOR.replace('description', options);
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
