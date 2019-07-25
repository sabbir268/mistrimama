@extends('new_layout.template')
@section('content')
<style>
    .main-bar {
        background-color: #fff !important;
    }
</style>

<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:94px;"></div>
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->

    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>FAQ</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb  Templates End -->
    <!-- contact area -->
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Contact Info Start -->

                    <h1>FAQ</h1>
                    <div class="padding-30 bg-white margin-b-30 clearfix sf-rouned-box">
                        <div id="box1" class="tab-pane fade in active">
                            <div class="sf-services-area" id="sf-services-listing">
                                @foreach($models as $model)
                                <div class="panel sf-panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse" href="#services-row-{{ $model->id }}"
                                                data-parent="#sf-services-listing">
                                                <span class="exper-author">{{ $model->question }}</span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="services-row-{{ $model->id }}" class="acod-body collapse">
                                        <div class="acod-content p-tb15">
                                            <p>{{ $model->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
@endsection