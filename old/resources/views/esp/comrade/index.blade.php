@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">
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
            <li><a href="#">কমরেড </a></li>
        </ol>

        <section class="box-typical box-typical-dashboard panel panel-default " >
            <header class="box-typical-header panel-heading">
                <div class="row">
                    <div class="col-md-6 float">
                        <button type="button" class="btn btn-sm btn-mm btn-inline " data-toggle="modal"
                            data-target="#addComradeMdl">নতুন যোগ করুন </button>
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
                            <td><img style="height:50px;width:50px" src="{{$comrade->c_pic}}"
                                    class="rounded-circle" alt="some"></td>
                            <td>{{$comrade->c_name}}</td>
                            <td>{{$comrade->c_phone_no}}</td>
                            <td>{{$comrade->email}}</td>
                            <td>{{$comrade->c_nid}}</td>
                            <td>
                                <div class="btn-gorup">
                                    <button class="btn btn-sm btn-success sr-only"><i class="fa fa-eye"></i></button>
                                    <a href="/esp/comrade/{{$comrade->id}}" class="btn btn-sm btn-warning "><i class="fa fa-edit"></i></a>
                                    @if($comrade->status == 1)
                                    <a href="/esp/comrade/ban/{{$comrade->id}}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i></a>
                                    @else 
                                        <a href="/esp/comrade/ban/{{$comrade->id}}" class="btn btn-sm btn-info "><i class="fa fa-check-square"></i></a>
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
                                        placeholder="Ex: amaila@gmail.com" >
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <label class="control-label" for="password">পাসওয়ার্ড :</label>
                                <div class="">
                                    <input type="password" name="password" class="form-control" required>
                                </div>
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
                                <label class="control-label" for="c_pic">ছবি :</label>
                                <div class="input-group mb-3">
                                        <label class="input-group-text rounded-0" for="">Choose file</label>
                                        <input type="file" name="c_pic" class="form-control" id="inputGroupFile02"
                                             required placeholder="Chose file">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nic_front">NID সামনের ছবি :</label>
                                <div class="input-group mb-3">
                                        <label class="input-group-text rounded-0" for="">Choose file</label>
                                        <input type="file" name="c_nic_front" class="form-control" id="inputGroupFile02"
                                             required placeholder="Chose file">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="control-label" for="c_nic_back">NID পিছনের ছবি :</label>
                                <div class="input-group mb-3">
                                        <label class="input-group-text rounded-0" for="">Choose file</label>
                                        <input type="file" name="c_nic_back" class="form-control" id="inputGroupFile02"
                                             required placeholder="Chose file">
                                </div>
                                
                            </div>


                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল </button>
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

@endsection