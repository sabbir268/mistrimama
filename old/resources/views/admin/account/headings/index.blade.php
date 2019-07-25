@extends('admin.cms.template')
@section('body')

<h1 class="page-title">
    <small></small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
        @endforeach

        <button class="btn btn-primary" data-target="#newHeading" data-toggle="modal">New Heading </button>
        <br>
        <br>

        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>All Heading</div>
            </div>

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>type</th>
                            <th class="align-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($headings)
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($headings as $heading)
                        <tr>
                            <td>{{$i}} @php $i++ @endphp </td>
                            <td>{{$heading->title}}</td>
                            <td>{{$heading->type }}</td>
                            <td class="align-center">
                                <a href="{{route('admin.accounts.heading.edit',$heading->id)}}" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
                                <a href="{{route('admin.accounts.heading.delete',$heading->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$headings->links()}}

                @endif

            </div>
        </div>
    </div>
</div>


{{-- modal sectitin --}}


<div class="modal fade" id="newHeading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.accounts.heading.insert')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="status">Title </label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status">Type</label>
                        <select name="type" class="form-control">
                            <option value="revenue">Revenue</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection