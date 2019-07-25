@extends('admin.layouts.application')
 
@section('top_menu')
@include('admin.common.top_menu')
@endsection

@section('sidebar_menu')
@include('admin.common.sidebar_menu')
@endsection

@section('body')
    @yield('body')
@endsection

@section('footer')
@include('admin.common.footer')
@endsection
