@extends('new_layout.template')
@section('content')

<style>
.main-bar{
    background-color: #fff !important;
}
</style>

<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:94px;"></div>
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>{{ $model->title }}</li>
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

                    <center><h1 class="text-mm" style="color: #fec00f;margin:0px 0px 7px 0px">{{ $model->title }}</h1></center>
                    <div class="after-titile-line"><span class="title-line-left" style="background:"></span><span
                    class="title-line-right" style="background:"></span></div>
                    <div class="padding-30  margin-b-30 clearfix sf-rouned-box">
                        {!! $model->description !!}
                    </div>
                    <!-- Contact Info Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
@endsection