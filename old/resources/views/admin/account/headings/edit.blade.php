@extends('admin.cms.template')
@section('body')

<h1 class="page-title">
    <small>Edit Heading</small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="portlet box green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>All Heading</div>
    </div>

    <div class="portlet-body ">
        <div class="flip-content">
            <div class="col-md-6 col-md-offset-3" style="display: contents;">
                <form action="{{route('admin.accounts.heading.update')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$heading->id}}" name="id">

                    <div class="form-group">
                        <label for="status">Title </label>
                        <input type="text" name="title" value="{{$heading->title}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status">Type</label>
                        <select name="type" class="form-control">
                            <option value="revenue" {{$heading->type == 'revenue' ? 'selected' : ''}}>Revenue
                            </option>
                            <option value="expense" {{$heading->type == 'expense' ? 'selected' : ''}}>Expense
                            </option>
                        </select>
                    </div>

                    <input type="submit" value="Save Change" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection