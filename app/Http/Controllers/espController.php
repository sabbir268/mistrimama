<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceSystem;
use Carbon\Carbon;
use App\Order;
use App\Models\service_providers_comrads as Comrades;
use App\Models\service_providers as ServiceProvider;
use App\Models\s_p_service_cat as SpCategory;
use App\Models\sub_category_details as SubCategoryDetails;
use App\Models\sub_category as SubCategory;
use App\Models\user_roles as UR;
use App\User;
use Auth;
use Hash;
use Validator;
use App\SMS;
use App\Account;
use App\RewardPoint;
use App\Referral;
use App\OrderDetails;
use DB;
use App\Offer;
use App\Models\category;
use Image;
use App\Booking;
use App\Events\ImageUploadEvent;

class espController extends Controller
{

    public function login()
    {
        return view('esp.login');
    }

    public function index()
    {

        $providers = User::find(Auth::user()->id)->serviceProvider;
        $services = $providers->first()->category->pluck('cats')->toArray();
        $newOrders = Order::where('status', '0')->whereIn('category_id', $services)->whereBetween('created_at', [Carbon::now('Asia/Dhaka')->subMinutes(200)->toDateTimeString(), Carbon::now('Asia/Dhaka')->toDateTimeString()])->paginate(5);
        $activeOrders = $providers->first()->orderDetails->where('status', '!=',  5)->where('status', '!=',  'cancel');

        $totalcomrades = $providers->first()->comrads; //total
        $comrades = $providers->first()->comrads->where('status', 1); // active
        $rp =  auth()->user()->rp->where('status', 'add')->sum('rp') - auth()->user()->rp->where('status', 'remove')->sum('rp');
        $balance = Account::where('user_id', Auth::user()->id)->where('status', 'credit')->sum('amount') - Account::where('user_id', Auth::user()->id)->where('status', 'debit')->sum('amount');
        $ratings = $providers->first()->serviceSystem->where('status', '=', 5)->sum('sp_rating') / ($providers->first()->serviceSystem->where('status', '=', 5)->count() == 0 ? 1 : $providers->first()->serviceSystem->where('status', '=', 5)->count());
        $miniStatements = auth()->user()->account()->where('status', '!=', 'income')->orderBy('id', 'DESC', 5)->get();

        //return $miniStatements;
        return view('esp.index', compact('newOrders', 'comrades', 'providers', 'activeOrders', 'balance', 'totalcomrades', 'rp', 'ratings', 'miniStatements', 'services'));
    }



    public function NewAvailAbleOrder()
    {
        // header('Content-Type: text/event-stream');
        // header('Cache-Control: no-cache');

        $providers = User::find(Auth::user()->id)->serviceProvider;
        $services = $providers->first()->category->pluck('cats')->toArray();
        $newOrders = Order::where('status', '0')->whereIn('category_id', $services)->whereBetween('created_at', [Carbon::now('Asia/Dhaka')->subMinutes(200)->toDateTimeString(), Carbon::now('Asia/Dhaka')->toDateTimeString()])->orderBy('id', 'DESC')->limit(2)->get();
        $comrades = $providers->first()->comrads->where('status', 1); // active

        return view('neworder', compact('newOrders', 'providers', 'comrades'));
    }

    public function NewAvailAbleOrderCount()
    {
        // header('Content-Type: text/event-stream');
        // header('Cache-Control: no-cache');

        $providers = User::find(Auth::user()->id)->serviceProvider;
        $services = $providers->first()->category->pluck('cats')->toArray();
        $newOrders = Order::where('status', '0')->whereIn('category_id', $services)->whereBetween('created_at', [Carbon::now('Asia/Dhaka')->subMinutes(200)->toDateTimeString(), Carbon::now('Asia/Dhaka')->toDateTimeString()])->orderBy('id', 'DESC')->limit(10)->get();
        // $comrades = $providers->first()->comrads->where('status', 1); // active

        // return view('neworder',compact('newOrders','providers','comrades'));
        return count($newOrders);
    }

    public function jobs()
    {
        $providers = User::find(Auth::user()->id)->serviceProvider;
        $services = $providers->first()->category->pluck('cats')->toArray();
        $newOrders = Order::where('status', '0')->whereIn('category_id', $services)->whereBetween('created_at', [Carbon::now('Asia/Dhaka')->subMinutes(200)->toDateTimeString(), Carbon::now('Asia/Dhaka')->toDateTimeString()])->paginate(5);
        $newOrdersRequests = $providers->first()->serviceSystem->where('status', '!=',  '5')->where('status', '!=',  'cancel')->where('service_provider_comrad_id', null);
        // $activeOrders = $providers->first()->serviceSystem->where('status', '!=',  5)->where('status', '!=',  'cancel')->where('service_provider_comrad_id', '!=', null);
        $activeOrders = OrderDetails::where('sp_id', $providers->first()->id)->where('status', '!=',  '5')->where('status', '!=',  'cancel')->get();
        $ongonigOrder = $providers->first()->serviceSystem->whereIn('status', ['2', '3', '4']);
        // $shcedeuledOrders = Order::where('status', '5')->where('order_date', '>' , Carbon::now('Asia/Dhaka')->format('Y-d-m'))->first()->ServiceSystem;
        $comrades = $providers->first()->comrads->where('status', 1); // active

        $balance = Account::where('user_id', Auth::user()->id)->where('status', 'credit')->sum('amount') - Account::where('user_id', Auth::user()->id)->where('status', 'debit')->sum('amount');
        // return $ongonigOrder;
        return view('esp.jobs', compact('newOrders', 'comrades', 'providers', 'activeOrders', 'ongonigOrder', 'newOrdersRequests', 'balance'));
        // return $shcedeuledOrders;
    }


    public function NewService($category_id, $order_id)
    {
        $addedServicesId = Booking::where("order_id", $order_id)->pluck('sub_categories_id')->toArray();
        $SubCategory = SubCategory::where('c_id', $category_id)->whereNotIn('id', $addedServicesId)->get();
        return view('new_service', compact('SubCategory', 'order_id'));
    }

    public function jobHistory()
    {
        $providers = User::find(Auth::user()->id)->serviceProvider->first();
        $orders = OrderDetails::where('sp_id', '=', $providers->id)->orderBy('id', 'desc')->paginate(8);
        return view('esp.job-history', compact('orders', 'providers'));
    }

    // public function jobHistorySearch($search){
    //     $services = ServiceSystem::Where('')->paginate(10);
    //     return view('esp.job-history','$services');
    // }

    public function jobHistoryAll($orderFrom, $dateFrom, $dateTo)
    {
        //  return 'ok';
        $providers = User::find(Auth::user()->id)->serviceProvider->first();
        if ($orderFrom == 'self') {
            $from = ['esp', 'comrade'];
        } else {
            $from = ['user', 'guest', 'admin', 'special'];
        }
        //sabbir
        $orders = OrderDetails::where('sp_id', '=', $providers->id)->whereBetween('order_date', [$dateFrom, $dateTo])->whereIn('order_from', $from)->paginate(10);
        return view('esp.job-all', compact('orders', 'providers', 'orderFrom'));
    }

    public function refer()
    {
        $users = User::find(Auth::user()->id);

        $providers = User::find(Auth::user()->id)->serviceProvider;
        $totalcomrades = $providers->first()->comrads; //total
        $comrades = $providers->first()->comrads->where('status', 1); // active
        $rp =  auth()->user()->rp->where('status', 'add')->sum('rp') - auth()->user()->rp->where('status', 'remove')->sum('rp');
        $balance = Account::where('user_id', Auth::user()->id)->where('status', 'credit')->sum('amount') - Account::where('user_id', Auth::user()->id)->where('status', 'debit')->sum('amount');
        $ratings = $providers->first()->serviceSystem->where('status', '=', 5)->sum('sp_rating') / ($providers->first()->serviceSystem->where('status', '=', 5)->count() == 0 ? 1 : $providers->first()->serviceSystem->where('status', '=', 5)->count());
        $refcode = auth()->user()->ref_code;

        // $topRefCode = DB::select("SELECT orders_details.user_id , orders_details.ref_code, COUNT(*) AS total FROM orders_details WHERE ref_code IS NOT NULL GROUP BY ref_code ORDER BY total DESC LIMIT 5");

        $topRefCode = OrderDetails::where("ref_code", "!=", null)->get()->count();
        if ($topRefCode) {
            $topRferer = User::where('ref_code', '=', $topRefCode[0]->ref_code)->first();
            $referHistory = OrderDetails::where('ref_code', '=', $users->ref_code)->get();
        } else {
            $topRferer = null;

            $referHistory = null;
        }

        // return $topRefCode;

        // $topReferars = Referral::groupBy('user_id')->where('status','>', '0')->get();
        return view('esp.refer', compact('totalcomrades', 'comrades', 'rp', 'balance', 'ratings', 'refcode', 'topRferer', 'referHistory'));

        // return $referHistory ;

    }

    public function behalfOrder()
    {
        $providers = User::find(Auth::user()->id)->serviceProvider;
        $services = $providers->first()->category->pluck('cats')->toArray();

        $services_category = category::whereIn('id', $services)->get();

        // return $services_category;
        //  $services_category = DB::select("SELECT categories.id,categories.name FROM categories");
        return view('esp.order.area_cat', compact('services_category'));
    }

    public function comrade()
    {
        $providers = User::find(Auth::user()->id)->serviceProvider;
        $services_category = DB::select("SELECT categories.id,categories.name FROM categories");
        $comrades = Comrades::where('s_id', $providers[0]->id)->paginate(10);
        return view('esp.comrade.index', compact('comrades', 'services_category'));
    }

    public function ComradeEdit($id)
    {
        // $comrades = new Comrades();
        $providers = User::find(Auth::user()->id)->serviceProvider;
        $comrades = $providers->first()->comrads->find($id);
        return view('esp.comrade.edit', compact('comrades'));
    }

    public function ComradeBan($id)
    {
        // $comrades = new Comrades();
        $comrades = Comrades::find($id);
        if ($comrades->status == 1) {
            $comrades->status = 0;
        } else {
            $comrades->status = 1;
        }

        $comrades->save();

        return back();
    }


    public function ComradeUpdate(Request $request)
    {
        $comrades = Comrades::find($request->id);
        if ($comrades->update($request->all())) {
            $request->session()->flash('success', 'Profile has been Successfull update!');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Profile has been Successfull update!');
            return redirect()->back();
        }
    }

    public function comradeInsert(Request $request)
    {
        $comrade =  new Comrades();

        $sp_id = User::find(Auth::user()->id)->sp->id;


        $user = new User();

        $rules = [
            'c_name' => 'string',
            'c_phone_no' => 'string|required|unique:users,phone_no',
            'password' => 'string|required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Something went wrong!');
        } else {
            $user->name = $request->c_name;
            $user->email = $request->email;
            $user->phone_no = $request->c_phone_no;
            $pass =  $request->password;
            $user->password = Hash::make($pass);
            $user->status = '2';
            $success = $user->save();

            $ur = new UR();
            $ur->user_id = $user->id;
            $ur->roles_id = 6;
            $ur->save();

            if ($success) {

                $comrade->c_name = $request->c_name;
                $comrade->s_id = $sp_id;
                $comrade->user_id = $user->id;
                $comrade->c_phone_no = $request->c_phone_no;
                $comrade->email = $request->email;
                $comrade->c_nid = $request->c_nid;
                $comrade->category = $request->category;



                // $comrade->c_pic = $request->c_pic;
                // $comrade->c_nic_back = $request->c_nic_back;
                // $comrade->c_nic_back = $request->c_nic_back;

                 $destinationPath = public_path('/uploads/SP/');

                // $image = $request->file('image');
                // $input['imagename'] = time().'.'.$image->getClientOriginalExtension();    
                // $img = Image::make($image->getRealPath());
                // $img->resize(250, 250, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$input['imagename']);

                // $image->move($destinationPath, $input['imagename']);

                if ($request->hasFile('c_pic')) {
                    $image = $request->file('c_pic');
                    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                    $img = Image::make($image->getRealPath());

                    //  $image->move($destinationPath, $input['imagename']);

                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['imagename']);

                    $comrade->c_pic = asset('/uploads/SP/') . "/" . $input['imagename'];
                    // $imageName1 = uniqid();
                    // event(new ImageUploadEvent($request->file('c_pic'), $imageName1));
                    // $comrade->c_pic = asset('/uploads/SP/') . "/" . $imageName1 . '.' . $request->file('c_pic')->getClientOriginalExtension();
                }

                if ($request->hasFile('c_nic_back')) {
                    $image = $request->file('c_nic_back');
                    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                    $img = Image::make($image->getRealPath());
                    //  $image->move($destinationPath, $input['imagename']);
                    $img->resize(250, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['imagename']);



                    $comrade->c_nic_back = asset('/uploads/SP/') . "/" . $input['imagename'];

                    // $imageName2 = uniqid();
                    // event(new ImageUploadEvent($request->file('c_nic_back'), $imageName2));
                    // $comrade->c_nic_back = asset('/uploads/SP/') . "/" . $imageName2 . '.' .        $request->file('c_nic_back')->getClientOriginalExtension();
                }


                if ($request->hasFile('c_nic_front')) {
                    $image = $request->file('c_nic_front');
                    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                    $img = Image::make($image->getRealPath());
                    //  $image->move($destinationPath, $input['imagename']);
                    $img->resize(250, 250, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['imagename']);



                    $comrade->c_nic_front = asset('/uploads/SP/') . "/" . $input['imagename'];

                    // $imageName3 = uniqid();
                    // event(new ImageUploadEvent($request->file('c_nic_front'), $imageName3));
                    // $comrade->c_nic_front = asset('/uploads/SP/') . "/" . $imageName3 . '.' . $request->file('c_nic_front')->getClientOriginalExtension();
                }


                // if ($request->hasFile('c_nic_front')) {
                //     $pic1 = $request->file('c_nic_front');
                //     $pic1->move('uploads/SP', $pic1->getClientOriginalName());
                //     $comrade->c_nic_front = $pic1->getClientOriginalName();
                // }

                // if ($request->hasFile('c_nic_back')) {
                //     $pic2 = $request->file('c_nic_back');
                //     $pic2->move('uploads/SP', $pic2->getClientOriginalName());
                //     $comrade->c_nic_back = $pic2->getClientOriginalName();
                // }



                // if ($comrade->save()) {
                //     $msgText = "Welcome to Mistri Mama Comrade. Login To your account. \n Phone No: " . $request->c_phone_no . "\n Password: " . $pass;
                //     SMS::send($request->c_phone_no, $msgText);

                //     $request->session()->flash('success', 'New Comrade Added !');
                //     return back();
                // } else {
                //     $request->session()->flash('error', 'Something went worng. Try Again!');
                //     return back();
                // }

                if ($comrade->save()) {
                    $request->session()->flash('success', 'Comrade added successfully');
                    return back();
                } else {
                    $request->session()->flash('error', 'Something went worng. Try Again!..');
                    return back();
                }
            } else {
                $request->session()->flash('error', 'Something went worng.');
                return back();
            }
        }
    }

    public function services()
    {
        $providers = User::find(Auth::user()->id)->serviceProvider;
        $services = $providers->first()->category->pluck('cats')->toArray();
        $subService = SubCategory::whereIn('c_id', $services)->get();
        $subServiceSelect = SubCategory::whereIn('c_id', $services)->pluck('id')->toArray();
        $subServiceDetails = SubCategoryDetails::whereIn('sub_categories_id', $subServiceSelect)->paginate(10);
        // return $subServiceDetails->first()->sub_category()->first()->category->get();
        // return $subServiceDetails;
        return view('esp.services', compact('services', 'subService', 'providers', 'subServiceDetails'));
    }

    public function incomeStatement()
    {
        $balance = Account::where('user_id', Auth::user()->id)->where('status', 'credit')->sum('amount') - Account::where('user_id', Auth::user()->id)->where('status', 'debit')->sum('amount');
        // $lastServiceAmount = 
        $providers = User::find(Auth::user()->id)->serviceProvider->first();
        $lastServiceAmount = OrderDetails::where('sp_id', '=', $providers->id)->orderBy('id', 'desc')->first();
        $lasServiceDetails = $lastServiceAmount ? $lastServiceAmount->bookings : 0;
        //return $lastServiceAmount->total_price;
        $lastCashOut = Account::where('user_id', auth()->user()->id)->where('reason', 'cashout')->where('status', 'debit')->orderBy('id', 'desc')->first();
        $lastRecharge = Account::where('user_id', auth()->user()->id)->where('reason', 'recharge')->orderBy('id', 'desc')->first();
        //return $lastRecharge;
        $todaysincome = Account::whereDate('created_at', Carbon::today())->where('status', 'credit')->first();
        $yesterdaysincome = Account::whereDate('created_at', Carbon::yesterday())->where('status', 'credit')->first();
        //return $todaysincome;

        //$thisWeekIncome =  Account::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', 'credit')->first();

        //  $now = Carbon::now();
        //  $start = Carbon::now()->startOfWeek(); 
        //  $end = Carbon::now()->endOfWeek();

        //return $thisWeekIncome;

        $thisWeekIncome =  Account::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', 'credit')->first();



        $statements = auth()->user()->account()->where('status', '!=', 'income')->orderBy('id', 'DESC')->paginate(20);

        $totalOrderValueSelf = OrderDetails::where('sp_id', '=', $providers->id)->whereIn('order_from', [auth()->user()->roles->first()->role, 'comrade'])->get()->sum('total_price');

        $totalOrderValueMm = OrderDetails::where('sp_id', '=', $providers->id)->whereIn('order_from', ['user', 'guest', 'admin', 'special'])->get()->sum('total_price');





        //return $lastServiceAmount;

        return view('esp.income-statement', compact('balance', 'lastServiceAmount', 'providers', 'lastCashOut', 'lastRecharge', 'todaysincome', 'yesterdaysincome', 'thisWeekIncome', 'statements', 'lasServiceDetails', 'totalOrderValueSelf', 'totalOrderValueMm'));
    }

    // public function cashout()
    // {
    //     return view('esp.recharge');
    // }

    // public function notification()
    // {
    //     return view('esp.recharge');
    // }

    // public function editInfo()
    // {
    //     return view('esp.recharge');
    // }

    public function offers()
    {
        $offers = Offer::where('target', '=', 'esp')->get();

        return view('esp.offers', compact('offers'));
    }

    public function recharge()
    {
        return view('esp.recharge');
    }
    public function faq()
    {
        $faqs = DB::SELECT("SELECT * FROM faqs WHERE type = 2");

        return view('esp.faq', compact('faqs'));
    }
    public function callUs()
    {
        return redirect()->route('esp-dashboard');
    }

    public function EditInfo()
    {
        $users = User::find(Auth::user()->id);
        return view('esp.edit_info', compact('users'));
    }

    public function cancelOrder($id)
    {
        $ss = ServiceSystem::find($id);
        //return $order ;
        $order = Order::find($ss->order_id);
        $order->status = '0';
        if ($order->save()) {
            if ($ss->delete()) {
                return back()->with('success', 'অর্ডার বাতিল করা হয়েছে');
            } else {
                return back()->with('danger', 'Something went wrong');
            }
        }
    }

    // public function updateProfile(ProfileEdit $request)
    // {

    //     $input = $request->all();
    //     unset($input['email']);
    //     $model = User::find(Auth::user()->id);
    //     /* $input['date_of_birth'] = \Carbon\Carbon::parse($request->date_of_birth)->format('Y-m-d');
    //      pr($input);*/
    //     //die();
    //     $model->update($input);
    //     $request->session()->flash('success', 'Profile has been Successfull update!');
    //     return redirect(route('dashboard'));
    // }



    public function manualService()
    {
        return view('esp.manual.service-book');
    }

    public function manualPhoneDist()
    {
        return view('esp.manual.phone-dist');
    }

    public function manualComradeAddDel()
    {
        return view('esp.manual.comrade-add-del');
    }

    public function manualComradeLogin()
    {
        return view('esp.manual.comred-login');
    }
    public function manualComradeWork()
    {
        return view('esp.manual.comred-login');
    }

    public function manualRecharge()
    {
        return view('esp.manual.recharge');
    }

    public function manualCashout()
    {
        return view('esp.manual.cashout');
    }

    public function manualSelfOrder()
    {
        return view('esp.manual.self-order');
    }

    public function manualSPLogin()
    {
        return view('esp.manual.sp-login');
    }
}
