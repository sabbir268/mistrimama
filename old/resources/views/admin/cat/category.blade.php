@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Service Categories
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Service Categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Categories Table</h3>
                            <span><a href="" class="btn btn-info fa fa-plus pull-right" data-toggle="modal" data-target="#add-cat">Add Category</a></span>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if (\Session::has('success'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                   <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($scat as $c)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->category->name}}</td>
                                    <td>{{$c->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="add-cat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="addcat" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Select Service</label>

                                <div class="col-sm-9">
                                    <select name="service" id="" class="form-control">
                                        @foreach($cat as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>

                                        @endforeach
                                    </select>    </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Please Enter Category Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Price</label>

                                <div class="col-sm-9">
                                    <input type="number" name="price" class="form-control" id="inputEmail3" placeholder="Please Enter Category Price">
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('js')

    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection