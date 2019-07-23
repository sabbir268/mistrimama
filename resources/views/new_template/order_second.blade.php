@extends('new_layout.template')
@section('content')
<div class="page-content">
  <!-- inner page banner -->
  <!-- Breadcrumb  Templates Start -->

  <div class="breadcrumb-row">
    <div class="container">
      <ul class="list-inline">
        {{-- <li><a href="../index.html">
            Home </a></li>
        <li>Signup</li> --}}
      </ul>
    </div>
  </div>
  <!-- Breadcrumb  Templates End -->
  <!-- Left & right section start -->

  <div class="section-content profiles-content">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
      <div class="row">
        <div class="col-md-12">
            <center> <h2>All Services</h2></center>
            <div class="form-group">
                <section class="rounde  ">
                    <div class="card-header">
                    <center><h5>Total: <span class="grand_total" id="grand_total">0.00</span>৳</h5></center>
                </div>
                @foreach($Sub_categories as $data)
                <div class="card mb-1">
                    <div class="card-body ">
                        <input type="hidden" name="ID" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-8">
                                <div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse" data-target="#collapsePanel{{$data->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    <h5 class="mb-0"> <span class=" rounded-circle "><i class="fa fa-chevron-down"></i></span> {{$data->name}}</h5>
                                </div>
                            </div>
                            <div class="col-md-4 text-center pt-2">
                                <span style="cursor :pointer" class="btn btn-sm btn-primary rounded addRemove" data-id="{{$data->id}}" id="addRemove{{$data->id}}">ADD</span>
                            </div>
                        </div>
    
                        <div class="row collapse mb-0 text-left" id="collapsePanel{{$data->id}}">
                        </div>
                    </div>
                </div>
    
                @endforeach
                </section>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="button"  value="Previous" class="btn btn-block btn-primary backToStepOne">
            </div>
        </div>
        <div class="col-md-4 pull-right">
            <div class="form-group">                
                <a href="{{asset('/third')}}" class="btn btn-block btn-primary forwardToThird"> Next</a>
            </div>
        </div>

    </div>
  </div>
    </div>
  </div>
</div>

<div class="response_modal"></div>
@endsection

@section('script')
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
 $(document).on("click", ".addRemove", function() {
    var id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "/sub-services/add",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      data: {
        id: id
      }, // serializes the form's elements.
      success: function(data) {
        $(".response_modal").html(data);
        $("#exampleModal").modal("show");
      }
    });
  });
</script> --}}

<script type='text/javascript' src='{{ asset("/new_theme/includes/js/raw.js")}}'></script>
@endsection