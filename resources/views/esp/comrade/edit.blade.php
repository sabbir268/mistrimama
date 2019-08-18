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

<?php 
    $disabledStatus = null;
?>
@section('content')
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb bg-white mb-1">
            <li><a href="{{route('esp-dashboard')}}">ড্যাশবোর্ড </a></li>
            <li><a href="#">সহকারী</a></li>
        </ol>
    </div>
</div>
<div class="container bg-light">
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($comrades, ['method' => 'POST','files' => true,'route' => ['esp.comrade.update'] ]) !!}

            <input type="text" value="{{$comrades->id}}" name="id" hidden>
            <div class="form-group row pt-5">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-user"></i>
                        Name
                    </label>
                </div>
                <div class="col-xl-8">
                    {!! Form::text('c_name', null,[$disabledStatus,'maxlength'=>'190','class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('c_name')}}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-event"></i>
                        Phone No.
                    </label>
                </div>
                <div class="col-xl-8">
                    {!! Form::text('c_phone_no',
                    null,['maxlength'=>'13',$disabledStatus,'id'=>'c_phone_no','class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('c_phone_no')}}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-event"></i>
                        Alt. Phone No.
                    </label>
                </div>
                <div class="col-xl-8">
                    {!! Form::text('c_alt_phone_no',
                    null,['maxlength'=>'13',$disabledStatus,'id'=>'c_alt_phone_no','class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('c_alt_phone_no')}}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-event"></i>
                        Email
                    </label>
                </div>
                <div class="col-xl-8">
                    {!! Form::email('email',
                    null,['maxlength'=>'13',$disabledStatus,'id'=>'email','class'=>'form-control']) !!}
                    <span class="error">{{$errors->first('email')}}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        NID No.
                    </label>
                </div>
                <div class="col-xl-5">
                    {!! Form::text('c_nid',null,['class'=>'form-control']) !!}
                    <span class="error">{{ $errors->first('c_nid')}}</span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        Comrade Image
                    </label>
                </div>
                <div class="col-xl-5">
                    {!! Form::text('c_pic',null,['class'=>'form-control',"onclick" =>
                    "openKCFinder(this)","readonly",'placeholder'=>'Choosefile']) !!}
                    <span class="error">{{ $errors->first('c_pic')}}</span>
                </div>
                <div class="col-xs-4 ">
                    <img height="120" width="120" src="{{$comrades->c_pic ? $comrades->c_nic_front : 'http://' }} "
                        alt="" class="img-responsive rounded">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        NID Front
                    </label>
                </div>
                <div class="col-xl-5">
                    {!! Form::text('c_nic_front',null,['class'=>'form-control',"onclick" =>
                    "openKCFinder(this)","readonly",'placeholder'=>'Choosefile']) !!}
                    <span class="error">{{ $errors->first('c_nic_front')}}</span>
                </div>
                <div class="col-xs-4 ">
                    <img height="120" width="120"
                        src="{{$comrades->c_nic_front ? $comrades->c_nic_front : 'http://' }} " alt=""
                        class="img-responsive rounded">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        NID Back
                    </label>
                </div>
                <div class="col-xl-5">
                    {!! Form::text('c_nic_back',null,['class'=>'form-control',"onclick" =>
                    "openKCFinder(this)","readonly",'placeholder'=>'Choosefile']) !!}
                    <span class="error">{{ $errors->first('c_nic_back')}}</span>
                </div>
                <div class="col-xl-4 p-0">
                    <img height="120" width="120" src="{{$comrades->c_nic_back ? $comrades->c_nic_back : 'http://' }} "
                        alt="" class="img-responsive rounded">
                </div>

            </div>

            <div class="form-group row">
                <div class="col-xl-12">
                    <button type="submit"  class="form-control btn-mm">
                        তথ্য আপডেট 
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')


@endsection