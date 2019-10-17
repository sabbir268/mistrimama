@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.woff">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.ttf">
@endsection

@section('topbar')
@include('esp.topbar')
@endsection

@section('sidebar')
@include('esp.sidebar')
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb bg-white mb-1">
            <li><a href="{{route('esp-dashboard')}}">ড্যাশবোর্ড </a></li>
            <li><a href="#">সহকারী</a></li>
        </ol>

        <section class="box-typical box-typical-dashboard panel panel-default ">
            <header class="box-typical-header panel-heading">
                <div class="row">
                    <div class="col-md-6 float">
                        <button type="button" class="btn btn-sm btn-mm btn-inline " data-toggle="modal"
                            data-target="#addComradeMdl">নতুন সহকারী যোগ করুন </button>
                    </div>
                    <div class="col-md-6">
                        <form class="site-header-search sr-only">
                            <input type="text" placeholder="Search" />
                            <button type="submit">
                                <span class="font-icon-search"></span>
                            </button>
                            <div class="overlay"></div>
                        </form>
                    </div>
                </div>
            </header>
            <div class="box-typical-body panel-body" style="height:393px">
                <table class="tbl-typical">
                    <thead>
                        <tr>
                            <th>
                                <div>ছবি </div>
                            </th>
                            <th>
                                <div>নাম </div>
                            </th>
                            <th>
                                <div>কোড</div>
                            </th>
                            <th>
                                <div>ফোন নাম্বার </div>
                            </th>
                            <th>
                                <div>ইমেইল </div>
                            </th>
                            <th>
                                <div>এন আই ডি নং</div>
                            </th>
                            <th>
                                <div>একশন</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comrades as $comrade)
                        <tr>
                            <td><img style="height:50px;width:50px" src="{{$comrade->c_pic}}" class="rounded-circle"
                                    alt="some"></td>
                            <td>{{$comrade->c_name}}</td>
                            <td>{{$comrade->comrade_code}}</td>
                            <td>{{$comrade->c_phone_no}}</td>
                            <td>{{$comrade->email}}</td>
                            <td>{{$comrade->c_nid}}</td>
                            <td>
                                <div class="btn-gorup">
                                    <button class="btn btn-sm btn-success sr-only"><i class="fa fa-eye"></i></button>
                                    <a href="/esp/comrade/{{$comrade->id}}" data-toggle="tooltip" data-placement="top"
                                        title="Edit" class="btn btn-sm btn-warning "><i class="fa fa-edit"></i></a>
                                    @if($comrade->status == 1)
                                    <a href="/esp/comrade/ban/{{$comrade->id}}" data-toggle="tooltip"
                                        data-placement="top" title="De-active" class="btn btn-sm btn-danger "><i
                                            class="fa fa-ban"></i></a>
                                    @else
                                    <a href="/esp/comrade/ban/{{$comrade->id}}" data-toggle="tooltip"
                                        data-placement="top" title="Active" class="btn btn-sm btn-success "><i
                                            class="fa fa-check-square"></i></a>
                                    @endif

                                    <button class="btn btn-sm btn-danger sr-only"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
            {{$comrades->links()}}
        </section>
        <!--.box-typical-dashboard-->
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade " id="addComradeMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">নতুন সহকারী এড করুন</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('comrade-insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-1">
                                <label class="control-label " for="c_name">সম্পূর্ন নাম </label>
                                <div class="">
                                    <input name="c_name" type="text" class="form-control"
                                        placeholder="Ex: Karim Hossain" required>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_phone_no">ফোন:</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-0 bg-white">+88</span>
                                    <input type="tel" name="c_phone_no" pattern="+[0-9]{11}" class="form-control"
                                        placeholder="Ex: 01775280411" required>
                                </div>
                            </div>
                            {{-- <div class="form-group mb-1">
                                <label class="control-label" for="c_alt_phone_no">Alternatove Phone:</label>
                                <div class="input-group">
                                    <span class="input-group-text rounded-0 bg-white">+88</span>
                                    <input type="tel" name="c_alt_phone_no" pattern="+[0-9]{11}" class="form-control"
                                        placeholder="Ex: 01775280411">
                                </div>
                            </div> --}}

                            <div class="form-group mb-1">
                                <label class="control-label" for="email">ইমেইল :</label>
                                <div class="">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Ex: amaila@gmail.com">
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <label class="control-label" for="password">পাসওয়ার্ড :</label>
                                <div class="">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <label class="control-label" for="category">ক্যাটেগরি:</label>
                                <div class="">
                                    <select name="category" id="" class="form-control">
                                        <option selected="true" value="">ক্যাটেগরি নির্বাচন করুন</option>
                                        @foreach($services_category as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <label class="control-label" for="c_pic">ছবি :</label>
                                <input type="file"  id="c_pic" class="dropify" placeholder="Chose file">
                            </div>

                        </div>
                        {{-- openKCFinder --}}
                        <div class="col-md-6">
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nid">NID নাম্বার :</label>
                                <div class="">
                                    <input type="text" name="c_nid" class="form-control" minlength="7" maxlength="20"
                                        placeholder="Ex: 1992324234234" required>
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nic_front">NID সামনের ছবি :</label>
                                <input type="file"  id="c_nic_front" class="dropify"
                                    placeholder="Chose file">

                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nic_back">NID পিছনের ছবি :</label>
                                <input type="file"  id="c_nic_back" class="dropify"
                                    placeholder="Chose file">
                            </div>


                        </div>
                        <span>Max Upload Image is 4MB. </span>
                        <span><a href="https://resizeimage.net/" target="_blank">Click Here</a> To resize your image in
                            online</span>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-mm">যোগ করুন </button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $('.custom-file-input').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    var drEvent = $('.dropify').dropify();

    drEvent.on('dropify.afterClear', function(event, element){
         $(this).attr('type','file');
        // $('#' + $id).attr('type', 'file');
    });
</script>
<script>
    function resizeImage(id) {
    var file = event.target.files[0];
    // Ensure it's an image
    if (file.type.match(/image.*/)) {
        //  console.log('An image has been loaded');
        // Load the image
        var reader = new FileReader();
        reader.onload = function (readerEvent) {
            var image = new Image();
            image.onload = function (imageEvent) {

                // Resize the image
                var canvas = document.createElement('canvas'),
                    max_size = 544,// TODO : pull max size from a site config
                    width = image.width,
                    height = image.height;
                if (width > height) {
                    if (width > max_size) {
                        height *= max_size / width;
                        width = max_size;
                    }
                } else {
                    if (height > max_size) {
                        width *= max_size / height;
                        height = max_size;
                    }
                }
                canvas.width = width;
                canvas.height = height;
                canvas.getContext('2d').drawImage(image, 0, 0, width, height);
                var dataUrl = canvas.toDataURL('image/jpeg');
                $.event.trigger({
                    type: "imageResized",
                    url: dataUrl,
                    id: id
                });
            }
            image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
    }
}

$(document).on("imageResized", function (event) {
    if (event.url) {
        $b64 = event.url;
        $id = event.id;
         $html = '<input type="text" name="'+$id+'" value="'+$b64+'">';
        $('#'+ $id).after($html);
    }
});

$('input[type="file"]').change(function () {
    $id = $(this).attr('id');
    resizeImage($id);
});
</script>

@endsection