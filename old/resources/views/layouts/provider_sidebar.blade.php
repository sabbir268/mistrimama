<!-- Profile Image -->
<div class="box box-primary">
    <div class="box-body box-profile">

        <h3 class="profile-username text-center">{{$p->name}}</h3>

        <p class="text-muted text-center">{{$p->phone_no}}</p>

        <ul class="list-group list-group-unbordered">
            @if(Auth::user()->hasRole('admin'))
            <li class="list-group-item">
                <a href="{{url('panel/provider/'.$p->id)}}" class="btn btn-default btn-block">Profile</a>
            </li>
            <li class="list-group-item">
                <a href="{{url('panel/provider/'.$p->id.'/business')}}" class="btn btn-default btn-block">Business Information</a>
            </li>
            @if($p->type == 0)
            <li class="list-group-item">
                <a href="{{url('panel/provider/'.$p->id.'/comrads')}}" class="btn btn-default btn-block">Commrads </a>
            </li>
                @endif
            <li class="list-group-item">
                <a href="{{url('panel/provider/'.$p->id.'/service')}}" class="btn btn-default btn-block">Services</a>
            </li>
                @elseif(Auth::user()->hasRole('provider'))
                <li class="list-group-item">
                    <a href="{{url('panel/profile')}}" class="btn btn-default btn-block">Profile</a>
                </li>
                <li class="list-group-item">
                    <a href="{{url('panel/business')}}" class="btn btn-default btn-block">Business Information</a>
                </li>
                @if(Auth::user()->sp->type ==0)
                <li class="list-group-item">
                    <a href="{{url('panel/comrads')}}" class="btn btn-default btn-block">Commrads</a>
                </li>
                @endif
                <li class="list-group-item">
                    <a href="{{url('panel/service')}}" class="btn btn-default btn-block">Services</a>
                </li>
                @endif

        </ul>

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- About Me Box -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">About Me</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> Alternate Phone Number</strong>

        <p class="text-muted">
{{
$p->alt_ph
}}        </p>

        <hr>

        <strong><i class="fa fa-map-marker margin-r-5"></i> Mailing Address</strong>

        <p class="text-muted">{{
$p->mailing_add
}} </p>

        <hr>

        <strong><i class="fa fa-pencil margin-r-5"></i> Smart Card Number</strong>

        <p class="text-muted">{{
$p->smart_card
}} </p>

        <hr>

        <strong><i class="fa fa-file-text-o margin-r-5"></i> E-Mail</strong>

        <p class="text-muted">{{
$p->email
}} </p>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
