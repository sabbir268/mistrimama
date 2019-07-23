@extends('admin.faq.template')

@section('body')
<h1 class="page-title">Referenzen Details
    <small></small>
    <a class="btn green float-right" href="{{ route('referenzen.edit',$model->id) }}">Edit</a>
</h1>

<div class="row">


    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Banner Section
                </div>
            </div>
            <div class="portlet-body flip-scroll">

                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <td><?= $model->banner_title ?></td>
                        </tr>
                        <tr>
                            <th>Sub Title</th>
                            <td>{{ $model->banner_sub_title }}</td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->service_logo) }}" class="logoImg" alt="" title=""></td>
                        </tr>
                        <tr>
                            <th>Duration</th>
                            <td>{{ $model->servise_duration }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?= $model->service_dec ?></td>
                        </tr>

                        <tr>
                            <th>Banner Image</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->banner_bg_image) }}" class="logoImg" alt="" title=""></td>
                        </tr>

                        <tr>
                            <th>Banner Sub Image</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->banner_sub_image) }}" class="logoImg" alt="" title=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Second Section (Ausgangslage)
                </div>
            </div>
            <div class="portlet-body flip-scroll">                
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <td><?= $model->reffer_second_sec_title ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?= $model->reffer_second_sec_des ?></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->reffer_second_sec_img) }}" class="logoImg" alt="" title=""></td>
                        </tr>                        

                        <tr>
                            <th>Section Background Image</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->reffer_second_sec_bgimg) }}" class="logoImg" alt="" title=""></td>
                        </tr>

                        <tr>
                            <th>Section Background Color</th>
                            <td>{{ $model->reffer_second_sec_bgcolor }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Third Section (Erbrachte Dienstleistungen)
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <td><?= $model->reffer_third_sec_title ?></td>
                        </tr>
                        <tr>
                            <th>Services Rendered</th>
                            <td>

                                <?php
//                                if ($model->reffer_service_rendered) {
//                                    $refferservicerendered = json_decode($model->reffer_service_rendered);
//                                    echo $refferservicerendered = implode(",", $refferservicerendered);
//                                }
                                
                                $serviceProvider =getServiceProvider($model->reffer_service_rendered);
                                ?>
                                <?php foreach($serviceProvider as $provider){  ?>
                                <?= strip_tags($provider->service_provider_name); ?>,
                                <?php } ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Section Background Image</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->reffer_third_sec_bgimg) }}" class="logoImg" alt="" title=""></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Four Section (Eingesetzte Technologien)
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <td><?= $model->reffer_four_sec_title ?></td>
                        </tr>
                        <tr>
                            <th>Technologies</th>
                            <td>

                            <?php
//                                if ($model->reffer_applied_technologies) {
//                                    $technologies = json_decode($model->reffer_applied_technologies);
//                                    echo $technologies = implode(",", $technologies);
//                                }
                                $technologies = getTechnologies($model->reffer_applied_technologies);
                            ?>
                            <?php foreach($technologies as $tech){ ?>
                            {{ $tech->logo_title }},
                            <?php } ?>

                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Fifth Section (Mehrwert)
                </div>
            </div>
            <div class="portlet-body flip-scroll">                
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <td><?= $model->reffer_five_sec_title ?></td>
                        </tr>

                        <tr>
                            <th>Section Background Image</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->reffer_five_sec_bgimg) }}" class="logoImg" alt="" title=""></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $model->reffer_five_sec_dec }}</td>
                        </tr>

                        <tr>
                            <th>Text Position</th>
                            <td>{{ $model->text_position }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Six Section (Kundenfeedback)
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <td><?= $model->six_sec_title ?></td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td><?= $model->client_desription ?></td>
                        </tr>

                        <tr>
                            <th>Client Image</th>
                            <td class="logoWrap"><img src="{{ asset('/images/referenzen/'.$model->client_img) }}" class="logoImg" alt="" title=""></td>
                        </tr>


                        <tr>
                            <th>Designation</th>
                            <td>{{ $model->client_designation }}</td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
    
</div>

<style>
    .logoImg{
        width: 200px;
    }
</style>

@endsection
