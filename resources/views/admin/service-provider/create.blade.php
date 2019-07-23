@extends('admin.home.template')
@section('body')

<h1 class="page-title">Referenzen
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
                {!! Form::open(array('route' => 'service-category.store' ,'method'=>'POST','files' => true ,'class'=>'form-horizontal')) !!}
                <div class="form-body">
                    
                    <div class="form-group">        
<!--                        <label class="col-md-3 control-label">Banner Section</label>-->
                        <div class="col-md-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">General</legend>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Page Slug</label>
                                        <div class="col-md-9">
                                            {!! Form::text('slug_name', null, array('placeholder' => 'Slug','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('slug_name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">        
<!--                        <label class="col-md-3 control-label">Banner Section</label>-->
                        <div class="col-md-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">Banner Setting</legend>
                                <div class="col-md-12">
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('banner_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('banner_title'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Sub Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('banner_sub_title', null, array('placeholder' => 'Sub Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('banner_sub_title'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Logo</label>
                                        <div class="col-md-9">
                                           {!! Form::file('service_logo', null, array('placeholder' => 'Logo','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('service_logo'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Logo Link</label>
                                        <div class="col-md-9">
                                            {!! Form::text('service_logo_link', null, array('placeholder' => 'Link','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('service_logo_link'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Duration</label>
                                        <div class="col-md-9">
                                            {!! Form::text('servise_duration', null, array('placeholder' => 'Duration','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('servise_duration'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            {!! Form::textarea('service_dec', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('service_dec'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Banner Image</label>
                                        <div class="col-md-9">
                                           {!! Form::file('banner_bg_image', null, array('placeholder' => 'Banner Image','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('banner_bg_image'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Banner Sub Image</label>
                                        <div class="col-md-9">
                                           {!! Form::file('banner_sub_image', null, array('placeholder' => 'Banner Sub Image','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('banner_sub_image'); ?></span>
                                        </div>
                                    </div>
                                    
                                    

                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">        
                        <div class="col-md-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">Second Section (Ausgangslage)</legend>
                                <div class="col-md-12">
                    
                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('reffer_second_sec_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_second_sec_title'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            {!! Form::textarea('reffer_second_sec_des', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_second_sec_des'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Image</label>
                                        <div class="col-md-9">
                                           {!! Form::file('reffer_second_sec_img', null, array('placeholder' => 'Image','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_second_sec_img'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Section Background Image</label>
                                        <div class="col-md-9">
                                           {!! Form::file('reffer_second_sec_bgimg', null, array('placeholder' => 'Image','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_second_sec_bgimg'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Section Background Color</label>
                                        <div class="col-md-9">
                                            {!! Form::text('reffer_second_sec_bgcolor', null, array('placeholder' => 'Section Background Color','class' => 'jscolor form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_second_sec_bgcolor'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Text Position</label>
                                        <div class="col-md-9">
                                            {!! Form::select('text_position',["lateralBg"=>"Right","uaaBg"=>"Left"] ,null, array('class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('text_position'); ?></span>
                                        </div>
                                    </div>
                    
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">        
                        <div class="col-md-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">Third Section (Erbrachte Dienstleistungen)</legend>
                                <div class="col-md-12">
                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('reffer_third_sec_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_third_sec_title'); ?></span>
                                        </div>
                                    </div>
                                    
                                    
                                                                        
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Section Background Image</label>
                                        <div class="col-md-9">
                                            {!! Form::file('reffer_third_sec_bgimg', null, array('placeholder' => 'Image','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_third_sec_bgimg'); ?></span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">        
                        <div class="col-md-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">Four Section (Eingesetzte Technologien)</legend>
                                <div class="col-md-12">
                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('reffer_four_sec_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_four_sec_title'); ?></span>
                                        </div>
                                    </div>
                                    
                                   
                                    
                                    
                                    
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">        
                        <div class="col-md-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">Fifth Section (Mehrwert)</legend>
                                <div class="col-md-12">
                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('reffer_five_sec_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_five_sec_title'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Section Background Image</label>
                                        <div class="col-md-9">
                                            {!! Form::file('reffer_five_sec_bgimg', null, array('placeholder' => 'Image','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_five_sec_bgimg'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            {!! Form::textarea('reffer_five_sec_dec', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('reffer_five_sec_dec'); ?></span>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Text Position</label>
                                        <div class="col-md-9">
                                            {!! Form::select('text_position',["rightValue"=>"Right","leftValue"=>"Left"] ,null, array('class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('text_position'); ?></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">        
                        <div class="col-md-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border label label-sm label-success">Six Section (Kundenfeedback)</legend>
                                <div class="col-md-12">
                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title</label>
                                        <div class="col-md-9">
                                            {!! Form::text('six_sec_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('six_sec_title'); ?></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            {!! Form::textarea('client_desription', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('client_desription'); ?></span>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Image</label>
                                        <div class="col-md-9">
                                            {!! Form::file('client_img', null, array('placeholder' => 'Image','class' => 'form-control', 'accept'=>"image/*")) !!}
                                            <span class="bg-danger"><?= $errors->first('client_img'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Designation</label>
                                        <div class="col-md-9">
                                            {!! Form::text('client_designation', null, array('placeholder' => 'Designation','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('client_designation'); ?></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Linkedin</label>
                                        <div class="col-md-9">
                                            {!! Form::text('linkedin', null, array('placeholder' => 'Linkedin','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('linkedin'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Xing</label>
                                        <div class="col-md-9">
                                            {!! Form::text('xing', null, array('placeholder' => 'Xing','class' => 'form-control')) !!}
                                            <span class="bg-danger"><?= $errors->first('xing'); ?></span>
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
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>


@endsection
