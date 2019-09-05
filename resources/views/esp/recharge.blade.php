@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">

@endsection

@section('topbar')
@include('esp.topbar')
@endsection

@section('sidebar')
@include('esp.sidebar')
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <section class="tabs-section">
            <div class="tabs-section-nav tabs-section-nav-icons">
                <div class="tbl">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" href="#tabs-1-tab-1" role="tab" data-toggle="tab"
                                aria-selected="true">
                                <span class="nav-link-in">
                                    <i class="font-icon font-icon-wallet"></i>
                                    এম.এফ.এস / ব্যাংক
                                </span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#" role="tab" data-toggle="tab" aria-selected="false"  style="cursor: not-allowed">
                                <span class="nav-link-in">
                                    <span class="font-icon font-icon-player-subtitres"></span>
                                    কার্ড পেমেন্ট
                                </span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <!--.tabs-section-nav-->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active show" id="tabs-1-tab-1">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <form action="{{route('esp.recharge.request')}}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">মাধ্যম <span
                                            class="invisible">পরিমান</span></span>
                                </div>
                                <!-- <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"> -->
                                <select class="form-control" name="mfs" id="mfs">
                                    <option value="">নির্বাচন করুন </option>
                                    <option value="bkash" style="background-image:url({{asset('images/bkash.png')}});">
                                        <strong>বিকাশ</strong> </option>
                                    <option value="bank"> <strong> ব্যাংক ডিপোজিট </strong></option>
                                    <option value="mm_agent"> <strong> মিস্ত্রিমামা এজেন্ট ডিপোজিট </strong></option>
                                </select>
                            </div>
                            <div class="input-group mb-3 trx_id">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">ট্রানজেকশন নাম্বার
                                    </span>
                                </div>
                                <input type="text" name="trxn" class="form-control" placeholder="xxxxxxxx">
                            </div>

                            <div class="input-group mb-3 bank_deposit" style="display:none">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">ব্রাঞ্চের নাম ও তারিখ
                                    </span>
                                </div>
                                <input type="text" name="brance_name" class="form-control bg-white input-group-text"
                                    placeholder="ব্রাঞ্চের নাম ">
                                <input type="date" name="deposit_date" class="form-control bg-white input-group-text"
                                    placeholder="তারিখ ">
                            </div>

                            <div class="input-group mb-3 mm_money_recit" style="display:none">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">রশিদ নং ও এজেন্ট আই
                                        ডি</span>
                                </div>
                                <input type="text" name="mm_trx_no" class="form-control bg-white input-group-text"
                                    placeholder="রশিদ নং ">
                                <input type="text" name="agent_id" class="form-control bg-white input-group-text"
                                    placeholder="এজেন্ট আই ডি ">
                            </div>
                            {{-- <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Number</span>
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">+88</span>
                                </div>
                                <input type="text" name="number" minlength="11" maxlength="11" class="form-control"
                                    placeholder="01XXXXXXXXX" required>
                            </div> --}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">টাকার পরিমান </span>
                                </div>
                                <input type="number" name="amount" max="99999" minlength="2" maxlength="5"
                                    class="form-control">
                            </div>


                            <button class="btn btn-success col-md-12" type="submit">নিশ্চিতকরন </button>

                        </form>
                    </div>
                </div>
                <!--.tab-pane-->
                <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <form action="">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Card Number</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">EXP
                                                Date</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default"
                                            aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">CVV</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default"
                                            aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-success col-md-12" type="submit">Confirm</button>

                        </form>
                    </div>
                </div>
                <!--.tab-pane-->
            </div>
            <!--.tab-content-->
            <hr>
            <div class="col-md-12">
                <div class="mfs-content">
                    <div class="bkash ">
                        <h3>
                            বিকাশ এর মাধ্যমে মিস্ত্রি মামা একাউন্ট-এ রিচার্জ করার জন্য নীচের ধাপগুলো অনুসরণ করুন -
                        </h3>

                        <p>
                            ধাপ-১: আপনার পার্সোনাল বিকাশ নাম্বার থেকে মিস্ত্রি মামা মার্চেন্ট নাম্বার ০১৭২৭০৬৩৫৯৩ এ
                            প্রয়োজন অনুযায়ী টাকা সেন্ড করুন।
                        </p>

                        <p>
                            ধাপ-২: টাকা রিচার্জ করার পর আপনার মোবাইল নাম্বার-এ বিকাশ থেকে একটি কনফার্মেশন এসএমএস আসবে তা
                            সংরক্ষন করুন।
                        </p>

                        <p>
                            ধাপ-৩: যেকোন স্মার্ট ডিভাইস থেকে আপনার আইডি এবং পাসওয়ার্ড দিয়ে মিস্ত্রি মামা একাউন্ট-এ লগইন
                            করুন।
                        </p>

                        <p>
                            ধাপ-৪: আপনার ড্যাশবোর্ড-এর বাম পাশের মেনু অপশন থেকে "রিচার্জ করুন" বাটন-টি সিলেক্ট করুন।
                        </p>

                        <p>
                            ধাপ-৫: এরপর স্ক্রিন-এ একটি বক্স দেখা যাবে যেখানে মাধ্যম (বিকাশ), ট্রানজেক্শন আইডি (সংরক্ষিত
                            বিকাশ-এর এসএমএস থেকে পাওয়া যাবে) এবং টাকার পরিমান (বিকাশ এর দ্বারা সেন্ডকৃত টাকার পরিমান)
                            পূরণ
                            করে "নিশ্চিতকরুন" বাটন-টি সিলেক্ট করুন।
                        </p>
                        ধাপ-৬: প্রদানকৃত তথ্যগুলো সঠিক হলে আপনার স্ক্রিন-এ একটি নোটিফিকেশন চলে আসবে এবং মিস্ত্রি মামা
                        আপনার রিচার্জ রিকোয়েস্ট-টি একসেপ্ট করলে ৩৬ ঘন্টার মধ্যে আপনার মোবাইল নাম্বার-এ একটি এসএমএস চলে
                        আসবে যা আপনি মিস্ত্রি মামা অনলাইন ব্যালান্স চেক করেও দেখতে পারবেন।
                        <p>


                    </div>

                    <p class="rocket d-none">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </p>

                    <div class="bank">
                        <h3>
                            ব্যাংক ডিপোজিট-এর মাধ্যমে মিস্ত্রি মামা একাউন্ট-এ রিচার্জ করার জন্য নীচের ধাপগুলো অনুসরণ
                            করুন -
                        </h3>

                        <p>

                            ধাপ-১: ব্র্যাক ব্যাংক এর যেকোন ব্রাঞ্চ থেকে মিস্ত্রি মামা ব্যাংক আকাউন্ট ১৫৩২২০৪২৩৮৫৪৯০০১ এ
                            প্রয়োজন অনুযায়ী টাকা জমা দিন।
                        </p>

                        <p>
                            ধাপ-২: টাকা জমা দেবার পর জমা স্লিপ-টি সংরক্ষন করুন।
                        </p>

                        <p>
                            ধাপ-৩: যেকোন স্মার্ট ডিভাইস থেকে আপনার আইডি এবং পাসওয়ার্ড দিয়ে মিস্ত্রি মামা একাউন্ট-এ লগইন
                            করুন।
                        </p>

                        <p>
                            ধাপ-৪: আপনার ড্যাশবোর্ড-এর বাম পাশের মেনু অপশন থেকে "রিচার্জ করুন" বাটন-টি সিলেক্ট করুন।
                        </p>

                        <p>
                            ধাপ-৫: এরপর স্ক্রিন-এ একটি বক্স দেখা যাবে যেখানে মাধ্যম (ব্যাংক ডিপোজিট), ব্রাঞ্চের নাম ও
                            তারিখ (সংরক্ষিত ডিপোজিট স্লিপ থেকে পাওয়া যাবে) এবং টাকার পরিমান (জমা টাকার পরিমান) পূরণ করে
                            "নিশ্চিতকরুন" বাটন-টি সিলেক্ট করুন।
                        </p>
                        ধাপ-৬: প্রদানকৃত তথ্যগুলো সঠিক হলে আপনার স্ক্রিন-এ একটি নোটিফিকেশন চলে আসবে এবং মিস্ত্রি মামা
                        আপনার রিচার্জ রিকোয়েস্ট-টি একসেপ্ট করলে ৩৬ ঘন্টার মধ্যে আপনার মোবাইল নাম্বার-এ একটি এসএমএস চলে
                        আসবে যা আপনি মিস্ত্রি মামা অনলাইন ব্যালান্স চেক করেও দেখতে পারবেন।
                        <p>
                    </div>

                    <div class="mm_agent">
                        <h3>
                            মিস্ত্রি মামা এজেন্ট ডিপোজিট-এর মাধ্যমে মিস্ত্রি মামা একাউন্ট-এ রিচার্জ করার জন্য নীচের
                            ধাপগুলো অনুসরণ করুন -
                        </h3>

                        <p>

                            ধাপ-১: কোনো প্রকার ঝামেলা ছাড়া মিস্ত্রি মামা এজেন্ট-এর নিকট প্রয়োজন অনুযায়ী টাকা জমা দিন।
                        </p>

                        <p>
                            ধাপ-২: টাকা জমা দেবার পর জমা রশিদ গ্রহণ করুন এবং তা সংরক্ষন করুন।
                        </p>

                        <p>
                            ধাপ-৩: যেকোন স্মার্ট ডিভাইস থেকে আপনার আইডি এবং পাসওয়ার্ড দিয়ে মিস্ত্রি মামা একাউন্ট-এ লগইন
                            করুন।
                        </p>

                        <p>
                            ধাপ-৪: আপনার ড্যাশবোর্ড-এর বাম পাশের মেনু অপশন থেকে "রিচার্জ করুন" বাটন-টি সিলেক্ট করুন।
                        </p>

                        <p>
                            ধাপ-৫: এরপর স্ক্রিন-এ একটি বক্স দেখা যাবে যেখানে মাধ্যম (মিস্ত্রি মামা এজেন্ট), রশিদ নং ও
                            এজেন্ট আইডি (সংরক্ষিত রশিদ থেকে পাওয়া যাবে) এবং টাকার পরিমান (জমা টাকার পরিমান) পূরণ করে
                            "নিশ্চিতকরুন" বাটন-টি সিলেক্ট করুন।
                        </p>
                        ধাপ-৬: প্রদানকৃত তথ্যগুলো সঠিক হলে আপনার স্ক্রিন-এ একটি নোটিফিকেশন চলে আসবে এবং মিস্ত্রি মামা
                        আপনার রিচার্জ রিকোয়েস্ট-টি একসেপ্ট করলে ৩৬ ঘন্টার মধ্যে আপনার মোবাইল নাম্বার-এ একটি এসএমএস চলে
                        আসবে যা আপনি মিস্ত্রি মামা অনলাইন ব্যালান্স চেক করেও দেখতে পারবেন।
                        <p>
                    </div>


                </div>

            </div>
        </section>
    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>
    $bkash = {{ MfsCharge('bkash') }};
    $rocket = {{ MfsCharge('rocket') }};
    $surecash = {{ MfsCharge('surecash') }};
    $bank = {{ MfsCharge('bank') }};


    function amountcal(){
        $am = $('#amount_place').val();
        $mfs = $('#mfs').val();

        if($mfs == 'bkash'){
            $tam = $am - ($am*$bkash/100);
            $('#amount').val($tam);
        }

        if($mfs == 'rocket'){
            $tam = $am - ($am*$rocket/100);
            $('#amount').val($tam);
        }

        if($mfs == 'surecash'){
            $tam = $am - ($am*$surecash/100);
            $('#amount').val($tam);
        }

        if($mfs == 'bank'){
            $tam = $am - ($am*$bank/100);
            $('#amount').val($tam);
        }
    }


    $('.bkash').hide();
    $('.surecash').hide();
    $('.rocket').hide();
    $('.bank').hide();

    $('#mfs').change(function(){
        $mfs = $(this).val();

        if($mfs == 'bkash'){
            $('.bkash').show();
            $('.surecash').hide();
            $('.rocket').hide();
            $('.bank').hide();
            $('.mm_agent').hide();
            $('.bank_deposit').hide();
            $('.trx_id').show();
            $('.mm_money_recit').hide();
        }else if($mfs == 'surecash'){
            $('.bkash').hide();
            $('.surecash').show();
            $('.rocket').hide();
            $('.bank').hide();
            $('.mm_agent').hide();
        }else if($mfs == 'rocket'){
            $('.bkash').hide();
            $('.surecash').hide();
            $('.rocket').show();
            $('.bank').hide();
            $('.mm_agent').hide();
        }else if($mfs == 'bank'){
            $('.bkash').hide();
            $('.surecash').hide();
            $('.rocket').hide();
            $('.bank').show();
            $('.mm_agent').show();
            $('.bank_deposit').show();
            $('.trx_id').hide();
            $('.mm_money_recit').hide();
        }else if($mfs == 'mm_agent'){
            $('.bkash').hide();
            $('.surecash').hide();
            $('.rocket').hide();
            $('.bank').hide();
            $('.mm_agent').show();
            $('.bank_deposit').hide();
            $('.trx_id').hide();
            $('.mm_money_recit').show();

        }
        else{
            $('.bkash').hide();
            $('.surecash').hide();
            $('.rocket').hide();
            $('.bank').hide();
        }   


        amountcal();
    });


    $('#amount_place').keyup(function(){
        amountcal();
    })

</script>

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