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
            $checkExis = $UserPromo->where('promocode', '=', $request->promocode)->where('user_id',auth()->user()->id)->get();
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

    // public function check(){
    //     return promocheck(1,100);
    // }
}
