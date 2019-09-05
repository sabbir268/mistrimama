<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Image;
use App\Http\Requests\ProfileEdit;
use App\Booking;
use App\Order;
use DB;
use App\Promotion;
use App\Userpromo;
use App\Models\sub_category;
use App\Offer;
use App\OrderDetails;
use Illuminate\Support\Facades\Hash;
use App\Models\roles;
use App\Models\user_roles;
use App\SMS;


class UsersController extends Controller
{

    /** code by sabbir */
    /** Users pages function */
    public function profile()
    {
        $users = User::find(Auth::user()->id);
        $services = sub_category::paginate(15);
        $activeOrders = $users->order()->where('status', '!=', '5')->where('status', '!=', 'cancel')->orderBy('created_at', 'desc')->first();
        if ($activeOrders) {
            $sumOrder = OrderDetails::find($activeOrders->id);
        } else {
            $sumOrder = '';
        }

        $rp =  auth()->user()->rp->where('status', 'add')->sum('rp') - auth()->user()->rp->where('status', 'remove')->sum('rp');

        return view('user.index', compact('activeOrders', 'services', 'users', 'sumOrder', 'rp'));
    }

    public function viewOrder()
    {
        $users = User::find(Auth::user()->id);
        $activeOrders = $users->order()->where('status', '!=', '5')->where('status', '!=', 'cancel')->orderBy('created_at', 'desc')->first();
        $subServices = sub_category::where('c_id', '=', $activeOrders->category_id);
        $sumOrder = DB::table('bookings')->select(DB::raw("SUM(quantity) as total_quantity, SUM(total_price) as total_price"))->where('order_id', $activeOrders->id)->get();
        return view('user.view-order', compact('activeOrders', 'subServices', 'sumOrder'));
    }

    public function refer()
    {
        $users = User::find(Auth::user()->id);
        $activeOrders = $users->order()->where('status', '!=', '5')->orderBy('created_at', 'desc')->first();
        $refcode = auth()->user()->ref_code;

        $topRefCode = DB::select('SELECT ref_code, COUNT(*) AS total FROM orders_details GROUP BY ref_code ORDER BY total DESC LIMIT 1');
        if ($topRefCode) {
            $topRferer = User::where('ref_code', '=', $topRefCode[0]->ref_code)->first();
            $referHistory = OrderDetails::where('ref_code', '=', $users->ref_code)->get();
        } else {
            $topRferer = null;

            $referHistory = null;
        }

        // return $referHistory;
        return view('user.refer', compact('activeOrders', 'users', 'refcode', 'topRferer', 'referHistory'));
    }

    public function removeItem($booking_id)
    {
        $booking = Booking::find($booking_id);
        $booking->delete();
        return back();
    }



    public function EditInfo()
    {
        $users = User::find(Auth::user()->id);
        return view('user.edit_info', compact('users'));
    }

    public function selfBook()
    {
        $users = User::find(Auth::user()->id);
        $services_category = DB::select("SELECT categories.id,categories.name FROM categories");
        $activeOrders = $users->order()->where('status', '!=', '5')->where('status', '!=', 'cancel')->orderBy('created_at', 'desc')->first();
        if ($activeOrders) {
            return redirect()->route('order-details');
        }
        return view('user.booking.self.area_cat', compact('users', 'services_category'));
    }

    public function othersBook()
    {
        $users = User::find(Auth::user()->id);
        $services_category = DB::select("SELECT categories.id,categories.name FROM categories");
        return view('user.booking.others.name_phone', compact('users', 'services_category'));
    }

    public function promotion()
    {
        return view('user.promotion');
    }

    public function promotionCheck(Request $request)
    {
        $UserPromo = new Userpromo();
        $today = date('Y-m-d');
        $codesCheck = Promotion::where('promocode', '=', $request->promocode)->where('validity_date', '>', $today)->get();
        if (count($codesCheck) > 0) {
            $checkExis = $UserPromo->where('promocode', '=', $request->promocode)->where('user_id', auth()->user()->id)->get();
            if (count($checkExis) > 0) {
                $request->session()->flash('warning', 'Already Applied!');
                return back();
            } else {
                $UserPromo->user_id = Auth::user()->id;
                $UserPromo->promocode = $request->promocode;
                $UserPromo->save();
                $request->session()->flash('success', 'Applied successfully!');
                return back();
            }
        } else {
            $request->session()->flash('warning', 'Failed to apply promocode!');
            return back();
        }
    }

    public function serviceHistory()
    {

        $orders = OrderDetails::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);

        return view('user.history', compact('orders'));
    }

    public function freeService()
    {
        return 'ok';
    }

    public function offers()
    {
        $offers = Offer::where('target', '=', 'user')->get();

        return view('user.offers', compact('offers'));
    }

    /** code by sabbir -- end */

    public function updateProfile(ProfileEdit $request)
    {

        $input = $request->all();
        unset($input['email']);
        $model = User::find(Auth::user()->id);
        /* $input['date_of_birth'] = \Carbon\Carbon::parse($request->date_of_birth)->format('Y-m-d');
         pr($input);*/
        //die();
        $model->update($input);
        $request->session()->flash('success', 'Profile has been Successfull update!');
        return redirect(route('dashboard'));
    }


    public function postChangePassword(Request $request)
    {
        $validatedData = $request->validate([
            //  'current_password' => 'required',
            'password' => 'required',
            're_password' => 'required|same:password',
        ]);


        User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->password)]);
        $request->session()->flash('success', 'Your password has been successfully updated');
        return redirect()->back();
    }

    public function updateProfilePicture(Request $request)
    {
        //pr($request->all());
        //die();
        $validator = Validator::make($request->all(), [
            'photo' => 'required',
        ]);
        if ($validator->passes()) {
            $user = User::find(Auth::user()->id);

            $user->photo = $request->photo;

            $user->save();
            $request->session()->flash('success', 'Profile Picture update!');
            return redirect()->back();
        }
    }


    public function addUser(Request $request)
    {
       // return $request;
        // $request->phone_no = "+88".$request['phone_no'];
        $rules = [
            'name' => 'string',
            'phone_no' => 'string|required|unique:users,phone_no',
            'password' => 'string|required',
            'area' => 'string|required'
        ];
        $validator = Validator::make($request->all(), $rules);
        // return dd($validator->fails());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            $userType = $request->user_type;
            $user = new User($request->except(['reason', 'type', 'ref_code']));
            // return $user->phone_no = $phone = "+88".$request['phone_no'];
            $refcode = strtolower(substr(str_replace(" ","",str_replace(".","",$request->name)),0,5)). rand(0, 9) . generateRandomString(3);
            
            $user->ref_code =  $refcode;
            $user->mfs_type = $request->mfs_type;
            $user->mfs_number = $request->mfs_number;
            $user->password = Hash::make($request->input('password'));

            if ($request->hasFile('profile_picture')) {
                 $destinationPath = public_path('/uploads');
                     $image = $request->file('profile_picture');
                    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                    $img = Image::make($image->getRealPath());

                    //  $image->move($destinationPath, $input['imagename']);

                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $input['imagename']);

                    $user->photo = asset('/uploads') . "/" . $input['imagename'];
            }

            if ($user->save()) {
                if ($request->has('reason')) {
                    $roles = new user_roles();
                    $roles->user_id = $user->id;
                    if ($request->reason == 'special_user') {
                        $roles->roles_id = 9;
                    } else {
                        $roles->roles_id = 2;
                    }

                    $roles->save();
                }

                $msg = "Dear " . $user->name . "! Thanks for registering in Mistri Mama. Use this referrer code “ " . $user->ref_code . " ” to earn reward points. Call +8809610222111 for details.";
                SMS::send($user->phone_no, $msg);
                // event(new UserRegisterEvent($user));

                if ($request->reason == 'special_user') {
                    return redirect()->back()->with("success", "Special User created successfully");
                }
            } else {
                $errors = new MessageBag(['errors' => ['Cannot create your account now. Please try later.']]);
                return redirect()->back()->withErrors($errors);
            }
        }
    }

    // public function check(){
    //     return promocheck(1,100);
    // }
}
