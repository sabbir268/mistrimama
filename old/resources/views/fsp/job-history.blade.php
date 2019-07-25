@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">   

@endsection

@section('topbar')
@extends('fsp.topbar')
@endsection

@section('sidebar')
@extends('fsp.sidebar')
@endsection


@section('content')
<div class="col-md-12">
            <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title pt-1">Services History</h3>
                    </div>

                    <div class="col-md-6">
                        <form class="site-header-search ">
                            <input type="text" placeholder="Search"/>
                            <button type="submit">
                                <span class="font-icon-search"></span>
                            </button>
                            <div class="overlay"></div>
                        </form>
                    </div>
                </div>
                
            </header>
            <div class="box-typical-body panel-body">
            <table class="table">
                                    <tr>
                                        <th>Current Status</th>
                                        <th>Order Number</th>
                                        <th>Service</th>
                                        <th>Sub Service</th>
                                        <th>Location</th>
                                        <th>Charges</th>
                                        <th>Service Time</th>
                                        <th>Service Date</th>
                                        <th>Selected Comrade</th>
                                    </tr>
                                    @foreach ($services as $service)
                                         <tr>
                                            <td>
                                                <button class="btn btn-warning">Working</button>
                                            </td>
                                            <td>#11223SRF345</td>
                                            <td>CCTV</td>
                                            <td>Repairing</td>
                                            <td>Bangladesh</td>
                                            <td> ৳ 20</td>
                                            <td>23:12:31:23</td>
                                            <td>7/4/18</td>
                                            <td>Mistri Mama<a> See details</a></td>
                                        </tr>
                                    @endforeach
                                    
                                </table>
            </div><!--.box-typical-body-->
            <header class="box-typical-header panel-heading">
                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                                <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                          <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                              <span aria-hidden="true">&laquo;</span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                          </li>
                                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item"><a class="page-link" href="#">4</a></li>
                                          <li class="page-item"><a class="page-link" href="#">5</a></li>
                                          <li class="page-item"><a class="page-link" href="#">6</a></li>
                                          <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                              <span aria-hidden="true">&raquo;</span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </nav>
                        </div>
                    </div>
                    
                </header>
        </section><!--.box-typical-dashboard-->
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>

<script>    
    $(document).ready(function() {
            $('.panel').each(function () {
                try {
                    $(this).lobiPanel({
                        sortable: true
                    }).on('dragged.lobiPanel', function(ev, lobiPanel){
                        $('.dahsboard-column').matchHeight();
                    });
                } catch (err) {}
            });
</script>
@endsection
