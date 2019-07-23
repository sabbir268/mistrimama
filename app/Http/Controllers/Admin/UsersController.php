<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdate;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use DB;
class UsersController extends Controller {

    public function index(Request $request) {

        $query = User::where('user_type', 4);
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        if ($request->dob) {
            $query->where('dob', $request->dob);
        }


        $models = $query->orderBy('id', 'DESC')->paginate(25);

        return view('admin.users.index', compact('models'));
    }

    public function create(Request $request) {
        return view('admin.users.create');
    }

    public function store(UserUpdate $request) {
        try {
            $input = $request->all();
            $input['user_type'] = 4;
            $input['password'] = bcrypt($request->password);
            User::create($input);
            $request->session()->flash('success', 'Users has been successfully added!');
            return redirect(route('users.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function show($id) {

        $model = User::where('user_type', 4)->findOrFail($id);
        return view('admin.users.show', ['model' => $model]);
    }

    public function edit($id) {
        $model = User::where('user_type', 4)->findOrFail($id);
        return view('admin.users.edit', compact('model'));
    }

    public function update(UserUpdate $request, $id) {
        try {
            $model = User::where('user_type', 4)->findOrFail($id);

            $input = $request->all();

            $model->update($input);
            $request->session()->flash('success', 'Users has been successfully Updated!');
            return redirect(route('users.index'));
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops something went wrong try again !');
        }
    }

    public function destroy($id) {
        //\Session::flash('error', 'Action not allow!');
        //return redirect()->back();
        $role = User::findOrFail($id);
        $role->forceDelete();
        return redirect()->back();
    }

    public function changePassword() {
        return view('admin.users.changepassword');
    }

    public function postChangePassword(Request $request) {
        $validatedData = $request->validate([
            //  'current_password' => 'required',
            'password' => 'required',
            're_password' => 'required|same:password',
        ]);


        User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->password)]);
        $request->session()->flash('success', 'Your password has been successfully updated');
        return redirect()->back();
    }

    public function forgotpasswordlink($id) {

        return view('auth.forgotpassword', ['id' => $id]);
    }

    public function postforgotpasswordpost(Request $request) {
        $input = $request->all();
        $userid = $input['id'];

        $validatedData = $request->validate([
            //  'current_password' => 'required',
            'password' => 'required',
            're_password' => 'required|same:password',
        ]);

        //User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->password)]);

        User::where('id', $userid)->update(['password' => bcrypt($request->password)]);
        $request->session()->flash('success', 'Your password has been successfully updated');
        return redirect()->back();
    }

    public function CustomerValidation(Request $request) {

        $message = [
            "password.regex" => "Password must have minimum of one capital letter number and special character.",
            "confirm_password.same" => "The password must match."
        ];

        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'phone' => 'required|numeric',
                    //'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$@$^,&*(?:;")#%]).*$/',
                    'password' => 'required|min:6',
                    'confirm_password' => 'required|same:password',
                        ], $message);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $validationError = validationError($errors);
            return response()->json(['response' => 1, 'errors' => $validationError]);
        } else {
            return response()->json(['response' => 1]);
        }
    }

    public function Register(Request $request) {


        DB::beginTransaction();
        try {


            $modelAttributes = $request->all();
            $modelAttributes['password'] = \Hash::make($request->password);
            if ($request->signUp == 1) {
                $modelAttributes['type_status'] = 1;
                $model = User::create($modelAttributes);
            } else {
                $modelAttributes['type_status'] = 2;
                $model = User::create($modelAttributes);
                $subscription = \App\SubscriptionPlan::where('subscription_type', 1)->first();
                if ($subscription) {
                    if ($subscription->trial_days > 0) {
                        $subscriptionDetails = $model->newSubscription('main','plan_E23byBh1xfQdjb')
                                ->trialDays($subscription->trial_days)
                                ->create($request->stripetoken);
                    } else {
                        $subscriptionDetails = $model->newSubscription('main','plan_E23byBh1xfQdjb')
                                ->create($request->stripetoken);
                    }
                    if ($subscriptionDetails) {
                        $stripe_id = $subscriptionDetails->stripe_id;
                        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
                        $subscription = \Stripe\Subscription::retrieve($stripe_id);
                        $updated = DB::table('subscriptions')->where('stripe_id', $subscription->id)->update([
                            'renews_at' => \Carbon\Carbon::createFromTimestamp($subscription->current_period_end),
                        ]);
                        if ($subscriptionDetails->trial_ends_at != null) {
                            $model->trial_ends_at = $subscriptionDetails->trial_ends_at;
                        }
                        $model->next_billing_date = \Carbon\Carbon::createFromTimestamp($subscription->current_period_end);

                        $model->save();
                    }
                }
            }

            DB::commit();
            return redirect()->route('home')->with('success', 'Registration Successful');
        } catch (Exception $e) {
            pr($e);
            DB::rollback();
        }
    }

}
