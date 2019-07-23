@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
@endsection

@section('topbar')
@include('user.topbar')
@endsection

@section('sidebar')
@include('user.sidebar')
@endsection

<?php 
    $disabledStatus = null;
?>
@section('content')
<div class="col-md-12 bg-white box-typical">
    <div class="row">
        <div class="col-md-5">
            <section class="box-typical-section">
                <header class="box-typical-header panel-heading btn btn-mm text-center">
                    <h3 class="panel-title">Modify Image</h3>
                </header>
                <div class="col-xs-6 offset-xs-2 col-md-6 offset-md-2 pt-5 pb-4 mt-1 mb-2">
                    <div class="uploading-container-left text-center">
                        <div class="drop-zone" style=" {{$users->photo != null ? 'background-image: url('.$users->photo.')' : 'backgorund-color:#ddd' }} ;
                        background-size: cover;
                        background-repeat: no-repeat;
                        background-position: center;">
                            <form action="{{route('user-photo-update')}}" method="POST" id="profile-upload">
                                @csrf
                                <div class="profile-image-upload">
                                    <i class="font-icon font-icon-cloud-upload-2 text-light"></i>
                                    <div class="drop-zone-caption text-light">Click to Upload Picture</div>
                                    <span class="btn btn-rounded btn-file bg-mm border-0">
                                        {{-- <span>Choose file</span> --}}
                                        <input type="text" id="profile-photo" name="photo" class="btn border-0 bg-mm "
                                            onclick="openKCFinderProfilePic(this)" style="width:70%" value="{{$users->photo != null ? $users->photo : 'Choose Image' }}"
                                            name="photo" readonly>
                                    </span>
                                </div>
                            

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xl-12">
                        <button type="submit" class="form-control btn-mm ">
                            Update Picture
                        </button>
                    </form>
                    </div>
                </div>
            </section>

        </div>
        <div class="col-md-7">
            <section class="box-typical-section">
                <header class="box-typical-header panel-heading btn btn-mm">
                    <h3 class="panel-title">Modify Info</h3>
                </header>
                {!! Form::model($users, ['method' => 'POST','route' => ['user-profile-update'] ]) !!}

                <div class="form-group row pt-5">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-user"></i>
                            Name
                        </label>
                    </div>
                    <div class="col-xl-8">
                        {!! Form::text('name', null,[$disabledStatus,'maxlength'=>'190','class'=>'form-control']) !!}
                        <span class="error">{{$errors->first('name')}}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-event"></i>
                            Birth Date
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group date">
                            {!! Form::text('date_of_birth',
                            null,['id'=>'date_of_birth',$disabledStatus,'placeholder'=>'1970-12-30','class'=>'form-control'])
                            !!}
                            <span class="input-group-append">
                                <span class="input-group-text"><i class="font-icon font-icon-calend"></i></span>
                            </span>
                        </div>
                        <span class="error">{{$errors->first('date_of_birth')}} </span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-phone"></i>
                            Phone
                        </label>
                    </div>
                    <div class="col-xl-8">
                        {{-- {!! Form::text('phone_no',
                        null,['maxlength'=>'18',$disabledStatus,'id'=>'phone_no','class'=>'form-control']) !!}
                        <span class="error">{{$errors->first('phone')}}</span> --}}
                        <div class="input-group">
                                <span class="input-group-text rounded-0 bg-white">+88</span>
                                <input type="tel" name="phone_no" value="{{substr($users->phone_no, 3)}}"
                                    pattern="+[0-9]{11}" class="form-control" placeholder="Ex: 01775280411">
                                <span class="error">{{$errors->first('phone')}}</span>
                            </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-pin-2"></i>
                            Address
                        </label>
                    </div>
                    <div class="col-xl-8">
                        {!! Form::textarea('address', null,['placeholder'=>'House # 00 , Road # 00 , Place , Area
                        ....','maxlength'=>'200',$disabledStatus,'class'=>'form-control', 'cols'=>'10', 'rows'=>'2'])
                        !!}
                        <span class="error">{{ $errors->first('address')}}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xl-12">
                        <button type="submit"  class="form-control btn-mm">
                            Update Info
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </section>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $('#date_of_birth').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true
	});
    // $('.profile-image-show').hide();
    $('#profile-photo').change(function(){
        // $('.profile-image-show').show();
        // $('.profile-image-upload').hide();
        alert('ok');
    });

    // if($('#profile-photo').val() != "Chose Image"){
    //     alert('ok');
    // }

    // console.log($('#profile-photo').val());


</script>

<script>
    window.page = "page";
        function SetUrl(url) {
            window.page.value = url;
    
        }
          function openKCFinderProfilePic(field) {
            window.page = field;
            window.open('{{ url("/laravel-filemanager?type=Images") }}', 'kcfinder_textbox',
                    'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                    'resizable=1, scrollbars=0, width=800, height=600'
                    );
        }
</script>
@endsection