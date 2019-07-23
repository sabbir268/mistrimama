@extends('admin.home.template')

@section('body')
<h1 class="page-title">Blogs
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Blogs Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Title </th>
                            <td>{{ $model->title }}</td>
                        </tr>
                        <tr>
                            <th>URL </th>
                            <td>{{ $model->url }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>

                        </tr>

                        <tr>
                            <th>Category Name</th>
                            <td>{{ $model->category->title }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?= $model->content ?></td>
                        </tr>


                        <tr>
                            <th>Image </th>
                            <td>{{ $model->image }}</td>
                        </tr>
                        <tr>
                            <th>Meta Title </th>
                            <td>{{ $model->meta_title }}</td>
                        </tr>


                        <tr>
                            <th>Meta Description</th>
                            <td>{{ $model->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>Meta Keyword</th>
                            <td><?= $model->meta_keyword ?></td>
                        </tr>


                        <tr>
                            <th>Create On</th>
                            <td>{{ $model->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Update On</th>
                            <td>{{ $model->updated_at }}</td>
                        </tr>


                    </tbody>
                </table>



                <div class="form-actions right">
                    <a class="btn green" href="{{ route('blogs.edit',$model->id) }}">Edit</a>

                </div>
            </div>

        </div>











        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>



@endsection
