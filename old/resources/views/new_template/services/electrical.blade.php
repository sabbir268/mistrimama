@extends('new_layout.template')
@section('content')
<style>
.service-list_item-categories li:before {
    font-family: 'FontAwesome';
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    content: '\F14A';
    font-size: 12px;
    display: inline-block;
    margin-right: 10px;
    color: #FBD232;
}
</style>
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:50px;"></div>
    {{-- <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Services</li>
                <li>{{ $model[0]->name }}</li>
            </ul>
        </div>
    </div> --}}
    <!-- Breadcrumb  Templates End -->
    <!-- contact area -->
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Contact Info Start -->

                    <div class="padding-30 bg-white margin-b-30 clearfix sf-rouned-box">
                        <div class="row">
                        <div class="col-md-10">
                            <h2>{{ $model[0]->name }}</h2>
                        </div>
                        <div class="col-md-2" style="padding-top: 22px">
                            <a href="{{asset('create-order')}}/{{$model[0]->id}}" class="btn-mm" style="padding: 10px 17px;border-radius: 22px">
                                Order Now
                            </a>
                        </div>
                    </div>
                        {!! $model[0]->description !!}
                        <div class="col-md-4 col-sm-4 service-list_item-categories">
                            <h4>Unique Benefits</h4>
                            {!! $model[0]->unique_benefits !!}
                        </div>

                        <div class="col-md-8 col-sm-8 service-category-hasib" style="border-left: 1px solid #ddd">
                            <h4>Service Category</h4>
                            {!! $model[0]->service_category !!}
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