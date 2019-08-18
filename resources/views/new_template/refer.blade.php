@extends('new_layout.template')
@section('content')
<link rel="icon" href="{{asset('/images/favicon.ico')}}" type="image/ico" sizes="16x16">
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:50px;"></div>
    {{-- <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Services</li>
                <li>{{ $model[0]->name }}</li>
    </ul>
</div>
</div> --}}
<!-- Breadcrumb  Templates End -->
<!-- contact area -->
<div class="container">
    <div class="section-content">
        <div class="row">
            <div class="col-md-12">
                <!-- Contact Info Start -->

                <div class="padding-30 bg-white margin-b-30 clearfix sf-rouned-box">
                        <div class="col-md-12" style="margin-bottom: 44px;">
                        
                        <h2>Refer and Get Paid</h2>

                        <p>Are you a social magnet? Earn some money by telling your friends or family about Mistri Mama services. </p> <p> Get started by creating a Mistri mama user account. Spread the word by sharing your unique referral code or referral link through blog posts, articles, emails, Facebook posts and tweets. You’ll get paid for every single service completion through your referral code or referral link. For referral link the referral code will get automatically applied.
                        </p>
                        <p><strong>Why Referrer will refer us?</strong></p>
                        <ul>
                            <li>Anyone can participate</li>
                            <li>Easy and hustle free refer process</li>
                            <li>Referrer get reward point by every successful refer</li>
                            <li>Referrer can use this points to get discount on Mistri Mama services</li>
                            <li>Referrer can also convert this point to cash</li>
                            <li>Easy and fast cash out process</li>
                        </ul>
                    </div>
                    <br>
                    <hr>

                    <style type="text/css">
                        .contact-info{
                            /*margin-right: 10px;*/
                        }

                        .sf-element-bx {
                            margin-bottom: 30px;
                            padding: 10px;
                        }
                    </style>
                    <div class="bg-white text-center margin-b-30 clearfix sf-rouned-box"   >
                        <h5 class="text-center" style="margin-bottom: 50px;">Any One can Earn in Follow below steps:</h5>
                        <div class="col-md-3 col-sm-6 contact-info" style="padding: 0px;">
                            <div class="sf-element-bx">
                                <img style="width: 100%" class="img-responsive" src="{{asset('/images/refer_img/01.jpg')}}">
                                <!-- <div class="icon-bx-md rounded-bx" style="color: #f3b400;">  <!-- <i class="fa fa-user-plus"></i> </div> -->
                                <h6>Become a Referrer</h6>
                                <p style="text-align: justify;padding: 0px 15px;">It's easy and free to join. Just register with your name, mobile number and valid Mobile banking number to get start from today. Mobile banking number is required for cash out process.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 contact-info" style="padding: 0px;">
                            <div class="sf-element-bx">
                                <img style="width: 100%" class="img-responsive" src="{{asset('/images/refer_img/02.jpg')}}">
                                <!-- <div class="icon-bx-md rounded-bx" style="color: #f3b400;">  <!-- <i class="fa fa-user-plus"></i> </div> -->
                                <h6>Refer Someone</h6>
                                <p style="text-align: justify;padding: 0px 15px;">Start sharing referral code or the referral link to others, who is looking for a service. Referrer can share his/her refer code or the referral link to any User through social media or a simple SMS.  
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 contact-info" style="padding: 0px;">
                            <div class="sf-element-bx">
                                <img style="width: 100%" class="img-responsive" src="{{asset('/images/refer_img/03.jpg')}}">
                                <!-- <div class="icon-bx-md rounded-bx" style="color: #f3b400;">  <!-- <i class="fa fa-user-plus"></i> </div> -->
                                <h6>Earn Reward Point</h6>
                                <p style="text-align: justify;padding: 0px 15px;">User can avail any Mistri Mama service by using the referral code or the link. For every successful service completion, referrer will receive 20% reward points of the actual bill in his/her accounts.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 contact-info" style="padding: 0px;">
                            <div class="sf-element-bx">
                                <img style="width: 100%" class="img-responsive" src="{{asset('/images/refer_img/04.jpg')}}">
                                <!-- <div class="icon-bx-md rounded-bx" style="color: #f3b400;">  <!-- <i class="fa fa-user-plus"></i> </div> -->
                                <h6>Get Paid</h6>
                                <p style="text-align: justify;padding: 0px 15px;">Referrer can convert his/her earned reward points into cash and easily cash out through his/her enlisted mobile banking number. To cash out referrer will require 4000 reward points.
                                </p>
                            </div>
                        </div>

                        <!-- <div class="col-md-3 col-sm-6 contact-info">
                            <div class="sf-element-bx padding-lr-30">
                                <div class="icon-bx-md rounded-bx" style="color: #f3b400;"> <i class="fa fa-handshake-o"></i> </div>
                                <h6>Refer</h6>
                                <p>
                                    Star sharing referral code to others for Mistri Mama who is looking for a service.  After availing the service reward point will be automatically added to referer's Mistri Mama account.
                                </p>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-3 col-sm-6 contact-info">
                            <div class="sf-element-bx padding-lr-30">
                                <div class="icon-bx-md rounded-bx" style="color: #f3b400;"> <i class="fa fa-plus-square"></i> </div>
                                <h6 class="text-center">Earn</h6>
                                <p>After successfully serving of the requested service, Referrer will get reward points for every reference that he/she made to use Mistri Mama&nbsp; on Mistri Mama account.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 contact-info">
                            <div class="sf-element-bx padding-lr-30">
                                <div class="icon-bx-md rounded-bx" style="color: #f3b400;"> <i class="fa fa-money"></i> </div>
                                <h6 class="text-center">Get Paid</h6>
                                <p>4000 reward points equal to BDT 200. For cash-out referrer needs to have at least 4,000 reward point on his MIstri Mama account to withdrawal by the MFS number.
                                </p>
                            </div>
                        </div> -->
                    </div>

                    <h2>Referrer Point Policy</h2>
                        <p>Referrer will get 20% of RP (reward point) of each successful referred service’s payable amount. (e.g.- Mr. X referred fan installation service, <strong> BDT 300</strong> to Mr. Y. After successful service, Mr. X will get 20% or 60 reward point). 20 reward points is equivalent to BDT 1. Referrer can withdraw his/her amount, if he/she has minimum 4000 reward points, which is equivalent to BDT 200. User or referrer can make service payment through reward point. Only half of total service amount can be adjusted through reward point.</p>
                 </p>
                 <div class="col-md-12 text-center">
                    <a href="{{asset('/register')}}" class="btn  btn-lg btn-mm"
                        style="border-radius: 10px;">Register Now</a>
                </div>
                </div>

                
                <!-- Contact Info Start -->
            </div>
        </div>
    </div>
</div>
<!-- contact area  END -->
</div>
@endsection