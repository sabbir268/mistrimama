@extends('admin.cms.template')
@section('body')
<h1 class="page-title">Pages
    <small></small>
</h1>
<div class="row">
    <div class="col-md-8">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Home Page Slider  Table</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;?>
                        @foreach($Sliders as $slider)
                        <tr>
                            <td>{{$id++}}</td>
                             <td>Picture</td>
                            <td>{{$slider->title}}</td>
                             <td>{{$slider->description}}</td>
                             <td>{{$slider->type}}</td>
                            <td  class="align-center">
                                 <a class="btn btn-danger btn-xs" href="{{url('admin/slider-delete/')}}/{{$slider->id}}/{{$slider->type}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

       <div class="col-md-4">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Home Page Slider  Form</div>
            </div>
            <div class="portlet-body flip-scroll">

                <form  action="{{ url('store-sliders') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
             <div class="form-group">
                 <label for="title">Title</label>
                 <input type="text" name="title" class="form-control">
             </div>
              <div class="form-group">
                 <label for="title">Description</label>
                <textarea rows="5" class="form-control" name="description"></textarea>
             </div>
              <div class="form-group">
                 <label for="title">Pictures</label>
                 <input type="file" name="pictures" class="form-control">
             </div>
             <input type="hidden" name="type" value="{{Request::segment(3)}}">
             <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-block">Submit</button>
             </div>
        </form>
            </div>
        </div>
    </div>

</div>
@endsection
