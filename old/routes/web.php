<?php
use Illuminate\Support\Facades\Route;
use App\ServiceSystem;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', ['as' => 'home', 'uses' => 'WebController@getHome']);
Route::get('/', ['as' => 'home', 'uses' => 'WebController@getHome']);
Route::get('/third',function(){
    return view('new_template.order_third');
});
Route::get('/second', 'BookingController@ShowSubServicesFront')->name('book.frot.second');
/** Social login api route */
Route::get('/callback/{provider}', 'SocialAuthController@callback');
Route::get('/redirect/{provider}', 'SocialAuthController@redirect')->name('social-login');
Route::get('/auth/login', 'AuthController@login')->name('user.login');
Route::post('/auth/login', 'AuthController@doLogin')->name('user.do-login');
Route::get('/signup', function () {
    return view('new_template.signup');
})->name('user.signup');
Route::get('/register', function () {
    return view('new_template.register');
})->name('user.signup');
Route::get('/auth/register', 'AuthController@login')->name('user.register');
Route::post('/auth/register', 'AuthController@doRegister')->name('user.do-register');


/** */

Route::post('add_esp', 'Service_provider@add_esp');
Route::post('add_fsp', 'Service_provider@add_fsp');
Route::post('add_mmt', 'Service_provider@add_mmt');
Route::any("/contact-us", 'WebController@contactus')->name('contact-us');
Route::any("/become-partner", 'WebController@becomePartner')->name('become-partner');
Route::get('admin/become-partner-show', 'CareerController@become_partner_show');
Route::get('admin/become-partner-delete/{id}', 'CareerController@destroy');
Route::get('SPF', 'Service_provider@spf')->name('spf-register');
Route::get('spf-confirm', 'Service_provider@spfConfirm')->name('spf-confirm');
Route::get('SpfCluster-Response/{id}', ['uses' => 'Service_provider@spfClusterResponse']);
Route::get('mmt', ['uses' => 'Service_provider@mmt'])->name('mmt-register');
Route::get('fsp', ['uses' => 'Service_provider@fsp'])->name('fsp-register');
Route::post('spf-validation', "ValidationController@spfValidation")->name('spf-validation');
Route::post('fsp-validation', "ValidationController@fspValidation")->name('fsp-validation');
Route::any('booking-login', "ValidationController@bookingLogin")->name('booking-login');
Route::get('searchthana', ['uses' => 'Service_provider@searchthanazone']);
Route::get('searchsubcat', ['uses' => 'Service_provider@searchtservicecat']);

Route::get('activate/provider/{id}', ['uses' => 'Service_provider@activateaccount'])->name('activate.user');
Route::get('deactivate/provider/{id}', ['uses' => 'Service_provider@deactivateaccount'])->name('deactivate.user');;

//Slider  Dashboard Routes
Route::get("admin/slider/{type}", "Admin\SliderController@index");
Route::get("admin/slider-delete/{id}/{type}", "Admin\SliderController@destroy");
Route::post("store-sliders", "Admin\SliderController@store");


Route::get('/service-booking', 'BookingController@book')->name('service-booking');
Route::any('/get-sub-catarory', 'BookingController@getSubCatarory')->name('get-sub-catarory');

Route::any('/booking/service-booking-popup', 'BookingController@bookServicePopup')->name('service-booking-popup');
Route::any('/booking-store', 'BookingController@bookingStore')->name('booking-store');

Route::post("/job-done", 'Service_provider_comrade\ServiceProviderComradController@job_done')->name('/job-done');

/* User routes */
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    /* profile */
    Route::post("/user-profile-update", 'UsersController@updateProfile')->name('user-profile-update');
    Route::post("/user-photo-update", 'UsersController@updateProfilePicture')->name('user-photo-update');
    // Route::post("/changepassword", 'UsersController@postC)->namehangePassword')->name('changePasswordPost');
    

    /** ------------ sabbir works here ------------------- */
    Route::get('/', 'UsersController@profile')->name('dashboard'); //dashboard
    Route::get('/profile/edit', 'UsersController@EditInfo')->name('user.edit-info'); // edit profile

    /** Refer */
    Route::get('/refer', 'UsersController@refer')->name('user.refer'); // promotion page
    /** promotion */
    Route::get('/promotion', 'UsersController@promotion')->name('promotion'); // promotion page
    Route::post('/promotion', 'UsersController@promotionCheck')->name('promotion-add'); //enter promo code 
    /** ------- */  

    Route::get('/services', 'UsersController@serviceHistory')->name('service-history'); // show service history
    Route::get('/free-srvices', 'UsersController@freeService')->name('free-srvices'); // show free service page
    Route::get('/offers', 'UsersController@offers')->name('offers'); // offers and others company promotional news

    /** Booking routes from user dashboard */
    Route::get('/booking', 'UsersController@selfBook')->name('book-self'); // booking for self
    Route::get('/booking/others', 'UsersController@othersBook')->name('book-others'); // booking for others
    Route::get('/order-details-view', 'UsersController@viewOrder')->name('order-details'); // booking for others

    Route::get('/remove-sub/{booking_id}', 'UsersController@removeItem');
});

Route::post('/service_provider_allocate', 'Admin\ServiceAllocatorController@service_allocate')->name('service_provider_allocate');

// Route::group(['prefix' => 'panel', 'middleware' => ['auth']], function () {

//     Route::get('/', function () {
//         return view('admin.home');
//     });

//     Route::get('/category', 'Service_provider@category');
//     Route::post('/addcat', 'Service_provider@addcategory');

//     Route::get('/category/{id}/service', function () {
//         return view('admin.cat.service');
//     });
//     Route::get('/service', function () {
//         return view('admin.home');
//     });

//     Route::prefix('provider')->group(function () {
//         Route::get('/', 'Service_provider@index');
//         Route::get('/{id}', 'Service_provider@profile');
//         Route::get('/{id}/edit_profile', 'Service_provider@edit_profile');
//         Route::get('/{id}/business', 'Service_provider@business');
//         Route::get('/{id}/comrads', 'Service_provider@comrads');
//         Route::get('/{id}/add_comrads', 'Service_provider@add_comrads');
//         Route::get('/{id}/service', 'Service_provider@service');
//         Route::get('/{id}/add_service', 'Service_provider@add_service');
//     });
//     Route::prefix('/')->group(function () {

//         Route::get('profile', 'Service_provider@p_profile');
//         Route::get('edit_profile', 'Service_provider@p_edit_profile');
//         Route::get('business', 'Service_provider@p_business');
//         Route::get('comrads', 'Service_provider@p_comrads');
//         Route::get('add_comrads', 'Service_provider@p_add_comrads');
//         Route::post('store_commrads', 'Service_provider@store_c');
//         Route::get('service', 'Service_provider@p_service');
//         Route::get('add_service', 'Service_provider@p_add_service');
//         Route::post('store_service', 'Service_provider@store_s');
//     });
// });

//Footer-Services//

Route::get('generator', ['uses' => 'WebController@generator']);
Route::get('plumbing', ['uses' => 'WebController@plumbing']);
Route::get('electrical', ['uses' => 'WebController@electrical']);
Route::get('ict', ['uses' => 'WebController@ict']);
Route::get('cctv', ['uses' => 'WebController@cctv']);
Route::get('ac', ['uses' => 'WebController@airConditional']);

//Footer-Company//
Route::get('refer', ['uses' => 'WebController@refer']);

Route::get('about', ['uses' => 'WebController@about']);
Route::get('career', ['uses' => 'WebController@career']);
Route::get('community-guidelines', ['uses' => 'WebController@communityGuidelines']);
//to be done
Route::get('terms', ['uses' => 'WebController@terms']);
Route::get('contact', ['uses' => 'WebController@contact']);
Route::get('privacy', ['uses' => 'WebController@privacy']);
Route::get('our-services', ['uses' => 'WebController@services']);

//Footer-Discover//
Route::get('how-it-works', ['uses' => 'WebController@howItWorks']);
Route::get('earn-money', ['uses' => 'WebController@earnMoney']);
Route::get('faq', ['uses' => 'WebController@faq']);
//Career Routes Place
Route::get('admin/career-show', 'CareerController@index');
Route::get('admin/spf', 'Service_provider@adminSpf')->name('admin-spf');
Route::post('career-store', 'CareerController@store')->name('career-store');
//Blog-Routes//
Route::get('blog', ['uses' => 'WebController@blog']);
Route::get('showOneBlog/{id}', ['uses' => 'WebController@showOneBlog']);
Route::get('showBlogByCategories/{id}', ['uses' => 'WebController@showBlogByCategor']);


Auth::routes();




Route::group(['prefix' => 'admin'], function () {
    Route::any('/login', 'Admin\HomeController@login')->name('adminLogin');
    Route::post('/login', 'Admin\HomeController@loginCheck')->name('adminLogin');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', 'Admin\HomeController@index')->name('admin.dashboard');
        //Route::get('/dashboard', 'Admin\HomeController@index')->name('admin');
        Route::get('/dashoard/index', 'Admin\HomeController@index')->name('admin.index');
        Route::get('/users', 'Admin\HomeController@registerUsers')->name('register-users');
        Route::get("/change-password", 'Admin\UsersController@changePassword')->name('adminchangepassword');
        Route::post("/changepassword", 'Admin\UsersController@postChangePassword')->name('adminChangePasswordPost');
        Route::get('/profile', 'Admin\HomeController@showProfile')->name('profile');
        Route::get('/editprofile', 'Admin\HomeController@editProfile')->name('editprofile');
        Route::any('/profile-update/{any}', 'Admin\HomeController@updateProfile')->name('profile-update');
        Route::resource("page-category", "Admin\PageCategoryController");
        Route::resource('general-setting', 'Admin\GeneralSettingController');
        Route::resource('blogs', 'Admin\BlogsController');
        Route::any('/get_slug_from_blogtitle', 'Admin\BlogsController@getSlug')->name('get_slug_from_blogtitle');
        Route::resource('blog-category', 'Admin\BlogCategoryController');
        Route::resource("faq", "Admin\FaqController");
        Route::resource("testimonial", "Admin\TestimonialController");
        Route::resource("service-category", "Admin\ServiceCategoryController");
        Route::resource("service-sub-category", "Admin\ServiceSubCategoryController");
        Route::any("position-update", "Admin\ServiceCategoryController@positionUpdate")->name('position-update');

        Route::resource("cms", "Admin\CmsController");

        Route::resource("service-provider", "Admin\ServiceProviderController");
        Route::get("service-provider", "Admin\ServiceProviderController@spAccounts")->name('admin.service_provider.accounts');


        Route::post("add-mmfirst-balance", "Admin\ServiceProviderController@addAmount")->name('add.mmfirstbalance');
        //
        Route::resource("cms-attribute", "Admin\CmsAttributesController");
        Route::resource("booking", "Admin\BookingController");
        Route::get("booking-history", "Admin\BookingController@jobHistory")->name('booking.history');


        Route::post('allowcate', 'Admin\ServiceAllocatorController@allowcateAdmin')->name('provider.allowcate');

        /** */
        Route::get("withdraw", "Admin\WithdrawController@index")->name('admin.withdraw');
        Route::get("accounts", "Admin\AdminAccountsController@index")->name('admin.accounts');
        Route::post("accounts", "Admin\AdminAccountsController@insert")->name('admin.accounts.insert');

        Route::get("accounts/headings", "Admin\AdminAccountsController@heading")->name('admin.accounts.headings');
        Route::post("accounts/headings", "Admin\AdminAccountsController@headingInsert")->name('admin.accounts.heading.insert');
        Route::get("accounts/headings/{id}", "Admin\AdminAccountsController@headingEdit")->name('admin.accounts.heading.edit');
        Route::post("accounts/headings/update", "Admin\AdminAccountsController@headingUpdate")->name('admin.accounts.heading.update');
        Route::get("accounts/headings/delete/{id}", "Admin\AdminAccountsController@headingDelete")->name('admin.accounts.heading.delete');

        Route::get("recharge_request", "Admin\AdminRechargeController@index")->name('admin.recharge.request');
        Route::get("recharge_request/export", "Admin\AdminRechargeController@rechargeRequestExport")->name('admin.recharge.export');
        
        Route::post("recharge_request/import", "Admin\AdminRechargeController@rechargeRequestImport")->name('admin.recharge.import');
       

        Route::post("recharge_request_approv", "Admin\AdminRechargeController@status")->name('admin.recharge.approve');

        Route::post("withdraw_approve", "Admin\WithdrawController@approve")->name('admin.withdraw.approve');

        Route::get("withdraw_request/export", "Admin\WithdrawController@withdrawRequestExport")->name('admin.withdraw.export');

        Route::post("withdraw_request/import", "Admin\WithdrawController@withdrawRequestImport")->name('admin.withdraw.import');

        

    });
});





/** Bookings route in BookingController */
Route::post('/create-order', 'BookingController@createOrder')->name('create.order'); // booking craete
Route::get('/create-order/{service}', 'BookingController@createOrderGet')->name('create.order.get'); // booking craete get
Route::get('/show-services', 'BookingController@ShowSubServices')->name('show.services'); // show sub service list
Route::post('/sub-services/add', 'BookingController@AddSubServiceDetails')->name('add.sub-service-details'); // show sub service details
Route::post('/sub-services-details/add', 'BookingController@AddSubService')->name('add.sub-service'); // add sub service details
Route::post('/sub-services-details/delete', 'BookingController@DeleteSubService')->name('delete.sub-service'); // add sub service details
Route::post('/sub-services/quantity-update', 'BookingController@QtyUpdate')->name('update.qty'); // area and service category store
Route::post('/sub-services-details/selected', 'BookingController@SelectedSubService')->name('selected.sub-service'); // add sub service details

// total price 
Route::get('/sub-services-details/total_price', 'BookingController@TotalPrice')->name('order.total_price');

Route::get('/date-time', 'BookingController@ShowDateTime')->name('date.time'); // show date time 
Route::post('/date-time/add', 'BookingController@AddDateTime')->name('add.date-time'); // store date and time

Route::get('/confirm', 'BookingController@OrderConfirm')->name('order.confirm'); // store date and time
Route::post('/confirm', 'BookingController@OrderConfirmDone')->name('add.order-confirm'); // store date and time

Route::post('/cancel', 'BookingController@CancelOrder')->name('cancel.order'); // booking cancel
Route::post('order-cancel', 'BookingController@CancelOrder')->name('order.cancel'); // booking cancel

/** Bookings route in BookingController end*/

Route::get('/sp', 'espController@login')->name('esp.login');
Route::group(['prefix' => 'esp', 'middleware' => ['esp']], function () {
    /** ESP pages routes*/
    Route::get('/dashboard', 'espController@index')->name('esp-dashboard'); // esp dahsboard
    Route::get('/jobs', 'espController@jobs')->name('esp-jobs'); // esp job-history
    Route::get('/services', 'espController@services')->name('esp.services'); // esp job-history
    Route::get('/income-statement', 'espController@incomeStatement')->name('esp.incomestmnt'); // esp job-history
    Route::get('/job-history', 'espController@jobHistory')->name('job-history-esp'); // esp job-history
    Route::get('/comrade', 'espController@comrade')->name('esp.comrade'); // esp comrade
    Route::get('/comrade/{id}', 'espController@ComradeEdit');// esp comrade
    Route::get('/comrade/ban/{id}', 'espController@ComradeBan');// esp comrade ban unban
    Route::post('/comrade', 'espController@ComradeUpdate')->name('esp.comrade.update'); // esp comrade
    Route::get('/refer', 'espController@refer')->name('esp.refer'); // esp comrade
    Route::get('/cashout', 'espController@cashout')->name('cashout'); // esp cashout
    Route::get('/notification', 'espController@notification')->name('notification'); // esp notification
    Route::get('/edit-info', 'espController@editInfo')->name('esp.edit-info'); // esp edit-info
    Route::get('/offers', 'espController@offers')->name('offer'); // esp offer
    Route::get('/recharge', 'espController@recharge')->name('recharge'); // esp recharge account
    Route::get('/faq', 'espController@faq')->name('esp-faq'); // esp recharge account
    Route::get('/call-us', 'espController@callUs')->name('esp-call-us'); // esp recharge account

    Route::post("/esp-profile-update", 'UsersController@updateProfile')->name('esp-profile-update');
    Route::post("/esp-photo-update", 'UsersController@updateProfilePicture')->name('esp-photo-update');

    Route::post('/insert-comrade', 'espController@comradeInsert')->name('comrade-insert');

    /** ESP order for others on behalf */
    Route::get('/order', 'espController@behalfOrder')->name('esp.behalf.order');

    Route::post('/recharge', 'RechargeRequestController@request')->name('esp.recharge.request');

});

Route::group(['prefix' => 'fsp', 'middleware' => ['auth']], function () {
    /** FSP pages routes*/
    Route::get('/dashboard', 'fspController@index')->name('fsp-dashboard'); // esp dahsboard
    Route::get('/job-history', 'fspController@jobHistory')->name('job-history-fsp'); // esp job-history
});

Route::group(['prefix' => 'comrade', 'middleware' => ['auth']], function () {
    /** Comrade pages routes*/
    Route::get('/dashboard', 'comradeController@index')->name('comrade-dashboard'); // esp dahsboard
    Route::get('/job-history', 'comradeController@jobHistory')->name('comrade-history'); // esp job-history
});

/** New Available order  */
Route::get('new_available_order', 'espController@NewAvailAbleOrder')->name('new.available.order');
Route::get('new_available_order_count', 'espController@NewAvailAbleOrderCount')->name('new.available.order.count');

/** Service Systems Update status routes */
Route::post('service-status-update', 'ServiceSystemController@statusUpdate')->name('service-update-sts');
//Route::post('service-status-pay', 'ServiceSystemController@statusUpdate')->name('service-pay');
Route::get('check-status/{order_id}', 'ServiceSystemController@checkStatus');

//withdraw request and approve
Route::group(['prefix' => 'withdraw', 'middleware' => ['auth']], function () {
    /** Comrade pages routes*/
    Route::post('/request', 'WithdrawRequestController@withdrawRequest')->name('withdraw.request'); // esp dahsboard
    Route::post('/approve', 'WithdrawRequestController@withdrawApprove')->name('withdraw.approve'); // esp job-history
});

// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END