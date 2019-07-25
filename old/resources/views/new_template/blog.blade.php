@extends('new_layout.template')
@section('content')
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->

    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Blog</li>
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

                    <h1>Blog</h1>
                    <div class="padding-30 bg-white margin-b-30 clearfix sf-rouned-box">
                        @foreach($blogCategories as $data)
                        <h2>{{ $data->title }}</h2>
                        @foreach ($models as $model)
                        @if($model->category_id == $data->id)
                        <div id="box1" class="tab-pane fade in active">
                            <div class="sf-services-area" id="sf-services-listing">
                                <div class="panel sf-panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse" href="#services-row-{{ $model->id }}"
                                                data-parent="#sf-services-listing">
                                                <span class="exper-author"> Building Maintenance</span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="services-row-{{ $model->id }}" class="acod-body collapse in">
                                        <div class="acod-content p-tb15">
                                            <div class="icon-bx-md rounded-bx">
                                                <img style="width: 100%; height:230px;"
                                                    src="{{url('images/blogs/thumbnail')}}/{{$model->image}}">
                                            </div>
                                            <h4>{{ $model->title }}</h4>
                                            <p>{{ substr($model->content, 0,250) }}</p>
                                            <a href="{{url('showOneBlog/')}}/{{$model->id}}">Learn more ...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <hr style="width: 100%; color: black; height: 1px;" />
                        @endforeach
                    </div>
                    <!-- Contact Info Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
@endsection