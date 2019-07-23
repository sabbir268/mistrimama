@extends('admin.faq.template')

@section('body')
     <h1 class="page-title">FAQ
        <small></small>
    </h1>
    <div class="row">
        <div class="col-md-12">
            
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Faq Details</div>

                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <tbody>
                            
                            <tr>
                                <th>Question </th>
                                <td>{{ $model->question }}</td>
                            </tr>

                            
                            <tr>
                                <th>Answer</th>
                                <td><?= $model->answer ?></td>
                            </tr>
 





                        </tbody>
                    </table>



                    <div class="form-actions right">
                        <a class="btn green" href="{{ route('faq.edit',$model->id) }}">Edit</a>

                    </div>
                </div>

            </div>









 

            <!-- END SAMPLE TABLE PORTLET-->

        </div>
    </div>


 
@endsection
