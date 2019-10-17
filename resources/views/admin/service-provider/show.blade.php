@extends('admin.faq.template')
@section('body')
<h1 class="page-title">Service Providers
    <small></small>



</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Basic Information
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $serviceProvider->name ? $serviceProvider->name : "-" }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone number</th>
                                    <td>{{ $serviceProvider->phone_no }}</td>
                                </tr>
                                <tr>
                                    <th>Alternate phone number</th>
                                    <td>{{ $serviceProvider->alt_ph }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $serviceProvider->email }}</td>
                                </tr>
                                <tr>
                                    <th>Mailing Address</th>
                                    <td>
                                        <?= $serviceProvider->mailing_add ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Photographs</th>
                                    <?php $passport = $serviceProvider->passport; ?>
                                    <td class="logoWrap"><img src="{{$passport}}" class="logoImg" alt="" title=""></td>
                                </tr>

                                <tr>
                                    <th>NID No.</th>
                                    {{--  $back = $serviceProvider->nic_back;--}}
                                    <td class="logoWrap">{{$serviceProvider->smart_card}}</td>
                                </tr>
                                <tr>
                                    <th>TIN certificate or trade license: *</th>
                                    <?php $tin = $serviceProvider->tin_cer; ?>
                                    <td class="logoWrap"><img src="{{$tin}}" class="logoImg" alt="" title=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img style="height:150px" src="{{$serviceProvider->nic_front}}" alt="NIC FRONT"
                                    class="img-responsive">
                            </div>
                            <div class="card-body">
                                <img style="height:150px" src="{{$serviceProvider->nic_front}}" alt="NIC FRONT"
                                    class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Business Information
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <header>
                    <h4>Zone and Cluster</h4>
                </header>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead>
                                <th>Cluster</th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{$serviceProvider->cluster->first()->clusters->name}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead>
                                <th>Zone</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$serviceProvider->zone->first()->zones->first()->name}}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>

                <header>
                    <h4>Registered Services</h4>
                </header>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead>
                                <th>Category</th>
                            </thead>
                            <tbody>
                                @foreach ($serviceProvider->Category as $category)
                                <tr>
                                    <td>{{ $category->category()->first()->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <header>
                            <h4>Time Scedule</h4>
                        </header>
                        <table class="table table-bordered table-striped table-condensed flip-content">
                            <thead>
                                <th>Day</th>
                                <th>Available Time</th>
                            </thead>

                            <tbody>
                                @foreach ($serviceProvider->time as $daytime)
                                <tr>
                                    <td>{{ $daytime->days->days }}</td>
                <td>{{ $daytime->time }}-{{ $daytime->end_time }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>

        </div> --}}

    </div>
</div>
</div>
<div class="col-md-12">
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Payment Information

            </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <tbody>
                    <tr>
                        <th>Mobile Banking</th>
                        <td>
                            <?= $serviceProvider->mobile_banking ?>
                        </td>
                    </tr>


                    <tr>
                        <th>MFS Account Number </th>
                        <td>{{ $serviceProvider->mfs_account }}</td>
                    </tr>



                </tbody>
            </table>
        </div>
    </div>
</div>

@if ($serviceProvider->type != 4)
<div class="col-md-12">
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Comrade Information
            </div>
        </div>
        <div class="portlet-body flip-scroll">
            @foreach ($serviceProvider->comrads as $comrad)
            <table class="table table-bordered table-striped table-condensed flip-content">
                <tbody>
                    <tr style="background-color:#ddd">
                        <th>Name</th>
                        <td>
                            <?= $comrad->c_name ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Phone No</th>
                        <td>
                            <?= $comrad->c_phone_no ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Alt Phone No</th>
                        <td>
                            <?= $comrad->c_alt_phone_no ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Picture</th>

                        <?php $picture = $comrad->c_pic; ?>

                        <td class="logoWrap"><img src="{{$picture}}" class="logoImg" alt="Nic back"></td>
                    </tr>

                    <tr>
                        <th>Nic Front</th>
                        <?php $nic_front_com = $comrad->c_nic_front; ?>

                        <td class="logoWrap"><img src="{{$nic_front_com}}" class="logoImg" alt="Nic back"></td>
                    </tr>
                    <tr>
                        <th>Nic Back</th>
                        <?php $nic_back_com = $comrad->c_nic_back; ?>

                        <td class="logoWrap"><img src="{{$nic_back_com}}" class="logoImg" alt="Nic back"></td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>
    </div>
</div>

@endif
</div>
</div>
<style>
    .logoImg {
        width: 100px
    }

</style>
@endsection