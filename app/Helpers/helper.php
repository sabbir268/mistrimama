<?php

use Vinkla\Instagram\Instagram;

function pr($data)
{
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}

function getUserPermissions($user)
{
    $roles = $user->roles;
    $perms = [];
    $names = [];
    foreach ($roles as $role) {
        $perms[] = $role->get()->pluck('name')->toArray();
    }
    $result = array_flatten($perms);
    return $result;
}

function checkRole($id, $role)
{
    $user = App\User::find($id);

    $roles = $user->roles->pluck('role');

    if ($role == $roles[0]) {
        return true;
    } else {
        return false;
    }
}

function menuActiveClass($active = null, $type = null)
{
    $currentPath = Request::route()->getName();
    $currentPathAry = explode(".", $currentPath);
    $controller = $currentPathAry;
    if ($type) {
        if (in_array($controller, $active)) {
            return "active open";
        }
    } else {
        if ($active == $controller) {
            return "active open";
        }
    }
}

function permit()
{
    if (isSuperAdmin()) {
        return true;
    }
    return true;
    $user = Auth::user();

    $args = func_get_args();
    $permissions = Session::has('permissions') ? Session::get('permissions') : [];

    //    $defaultPermission = getDefaultPermission();
    //
    //    $permissions = array_merge($defaultPermission, $permissions);
    $result = false;
    foreach ($args as $arg) {
        if (count(array_intersect($arg, $permissions)) == count($arg)) {
            $result = true;
        }
    }

    return $result;
}

function isSuperAdmin()
{
    $user = Auth::user();
    if ($user->user_type == 1) {
        return true;
    }
    return false;
}

function createUrl()
{
    $arg_list = func_get_args();
    $url = "";
    foreach ($arg_list as $key => $val) {
        $url .= "$val ";
    }
    $url = rtrim($url);
    $url = str_replace(" ", "-", $url);
    $url = preg_replace('/[^a-zA-Z0-9_-]|$/s', '', $url);
    $url = strtolower($url);

    return $url;
}

function getConfigValue($configValue, $name = false)
{

    $config = Session::get('generalSetting');
    $model = \App\GeneralSetting::where('veriable_slug', $configValue)->first();
    if ($model) {
        return $model->setting_value;
    }
    if (isset($config[$configValue])) {
        if ($name) {
            $result = array(
                'name' => $config[$configValue]['name'],
                'value' => $config[$configValue]['value'],
                'alt_text' => $config[$configValue]['alt_text'],
            );
            return (object) $result;
        } else {
            return isset($config[$configValue]['value']) ? $config[$configValue]['value'] : "-";
        }
    } else {
        return false;
    }
}

function getState($name = false)
{
    $state = array('NSW' => 'NSW', 'NT' => 'NT', 'QLD' => 'QLD', 'WA' => 'WA', 'VIC' => 'VIC', 'SA' => 'SA', 'TAS' => 'TAS');
    if ($name) {
        return isset($state[$name]) ? $state[$name] : "-";
    } else {
        return $state;
    }
}

function getPagesAttribute()
{
    $type = ['text' => 'Text', 'image' => 'Image', 'editor' => 'Editor', 'video' => 'Video'];
    return $type;
}

function getPageData($id)
{
    $pages = App\Cms::findOrFail($id);
    if ($pages) {
        $attribute = array();
        $attributeModels = App\CmsAttributes::where('page_id', $pages->id)->get();

        foreach ($attributeModels as $pageAttribute) {
            //                $attribute[$pageAttribute->url] = (object) array(
            //                    'value' => $pageAttribute->value,
            //                    'alt_text' => $pageAttribute->alt_text
            //                );
            // echo $pageAttribute->url."".$pageAttribute->value;


            $attribute["$pageAttribute->url"] = $pageAttribute->value;
        }


        $pages->pageAttribute = (object) $attribute;
    }
    return $pages;
}

function getTestimonial()
{
    $model = \App\Testimonial::where('status', 1)->get();
    return $model;
}

function myCreateUrl($param1, $param2 = '', $param3 = '', $param4 = '')
{

    $url = $param1 . " " . $param2 . ' ' . $param3 .= ' ' . $param4;
    $url = rtrim($url);
    $url = str_replace(" ", "-", $url);
    $url = preg_replace('/[^a-zA-Z0-9_-]|$/s', '', $url);
    $url = strtolower($url);
    $count = '';
    $findCount = true;
    return $url;
}

function validationError($errors)
{
    $validationError = array();
    foreach ($errors as $key => $message) {
        if (!isset($validationError[$key])) {
            $validationError[$key] = is_array($message) ? $message[0] : $message;
        }
    }
    return $validationError;
}

function showDate($date, $type = false)
{
    if ($date) {
        $type = false;
        if ($type) {
            return \Carbon\Carbon::parse($date)->format('d-m-Y h:i A');
        } else {
            return \Carbon\Carbon::parse($date)->format('d-m-Y');
        }
    } else {
        return "-";
    }
}

function instragramFeed()
{

    $instagram = new Instagram(config('services.instagram.access-token'));
    $medias = $instagram->media();
    $allImages = [];
    foreach ($medias as $image) {
        if ($image->type == 'image') {
            $allImages[] = array(
                'type' => $image->type,
                'thumbnail' => $image->images->thumbnail->url,
                'image' => $image->images->standard_resolution->url,
            );
        } else if ($image->type == 'video') {
            $allImages[] = array(
                'type' => $image->type,
                'thumbnail' => $image->images->thumbnail->url,
                'image' => $image->videos->standard_resolution->url,
            );
        }
    }
    return $allImages;
}

function getJsonDecodedValue($data)
{
    $arrayValue = GuzzleHttp\json_decode($data);
    if (is_array($arrayValue)) {
        return $arrayValue;
    } else {
        return [];
    }
}

function getServiceProvider($data)
{
    if ($data) {
        $serviceProviderIds = getJsonDecodedValue($data);
        if ($serviceProviderIds) {
            $model =  App\ServiceProvider::whereIn('id', $serviceProviderIds)->get();
            return $model;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function getTechnologies($data)
{
    if ($data) {
        $technologiesIds = getJsonDecodedValue($data);
        if ($technologiesIds) {
            $model =  App\Technology::whereIn('id', $technologiesIds)->get();
            return $model;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function getFirstReference()
{
    $model = \App\Referenzen::orderBy('position_no')->first();
    if ($model) {
        return $model->slug_name;
    } else {
        return false;
    }
}


function getSchiduleTime($type = 0)
{
    $schiduleTime = array(
        /*  1=>"1 AM",
        2=>"2 AM",
        3=>"3 AM",
        4=>"4 AM",*/
        5 => "5 AM - 6 AM",
        6 => "6 AM - 7 AM",
        7 => "7 AM - 8 AM",
        8 => "8 AM - 9 AM",
        9 => "9 AM - 10 AM",
        10 => "10 AM - 11 AM",
        11 => "11 AM - 12 PM",
        12 => "12 PM - 1 PM",
        13 => "1 PM - 2 PM",
        14 => "2 PM - 3 PM",
        15 => "3 PM - 4 PM",
        16 => "4 PM - 5 PM",
        17 => "5 PM - 6 PM",
        18 => "6 PM - 7 PM",
        19 => "7 PM - 8 PM",
        20 => "8 PM - 9 PM",
        21 => "9 PM - 10 PM",
        22 => "10 PM- 11 PM",
        23 => "11 PM - 12 AM",
        // 24=>"12 AM",
    );
    if ($type) {
        return isset($schiduleTime[$type]) ? $schiduleTime[$type]  : "-";
    } else {
        return $schiduleTime;
    }
}
function getFaqType($type = false)
{

    $faqArray = [
        1 => "User FAQ's",
        2 => "ESP FAQ's",
        3 => "Referral FAQ's",
        4 => "Comrades FAQ's"
    ];
    if ($type) {
        return isset($faqArray[$type]) ? $faqArray[$type] : '-';
    } else {
        return $faqArray;
    }
}
function getArea()
{
    return \App\Cluster::first()->pluck('name', 'id');
    return [
        "XMLID_1655_" => 'Azimpur',
        "XMLID_1652_" => "Badda",
        "XMLID_1870_" => "Baridhara",
        "XMLID_1752_" => "Dhanmondi",
        "XMLID_1791_" => "Gulshan",
        "XMLID_1646_" => "Khilkhet",
        "XMLID_1665_" => "Khilgaon",
        "XMLID_1746_" => "Mirpur",
        "XMLID_1738_" => "Mohammadpur",
        "XMLID_1658_" => "Motijheels",
        "XMLID_1765_" => "New Market",
        "XMLID_1749_" => "Old Dhaka",
        "XMLID_1768_" => "Ramna",
        "XMLID_1839_" => "Tejgaon",
        "XMLID_1661_" => "Uttara"
    ];
}
function updateCategoryPrice()
{
    $models = \App\Models\service_providers_services::select('sc_id', DB::raw('min(s_price) as min'), DB::raw('MAX(s_price) as maxprice'))
        ->groupBy('sc_id')->get();
    //pr($model);

    foreach ($models as $model) {
        \App\Models\sub_category::where('id', $model->sc_id)
            ->update(['min_price' => $model->min, 'max_price' => $model->maxprice]);
    }
}

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function MfsCharge($mfs)
{
    $data = \App\GeneralSetting::where('setting_name', 'mfs_charge')->where('veriable_slug', $mfs)->first()->setting_value;

    return $data;
}


function promocheck($id, $am)
{
    $promouser = \App\Userpromo::where('user_id', $id)->where('uses_status', 0)->orderBy('id', 'DESC')->first();
    //return $promouser;
    if ($promouser) {
        $promo = $promouser->promotion->where('promocode', strtoupper($promouser->promocode))->first();
        if ($promo) {
            if ($promo->uses_count == $promouser->uses_count) {
                return 0.00;
            }
            $discount = ($am * $promo->percent / 100);

            $promouser->uses_count = $promouser->uses_count + 1;
            $promouser->save();

            if ($promo->up_to < $discount) {
                return $promo->up_to;
            } else {
                return $discount;
            }
        } else {
            return 0.00;
        }
    } else {
        return 0.00;
    }
}


function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
            if (!$header) {
                $header = $row;
            } else {
                $data[] = array_combine($header, $row);
            }
        }
        fclose($handle);
    }

    return $data;
}


function totalBalance($id)
{
    $balance = \App\Account::where('user_id', $id)->where('status', 'credit')->sum('amount') - \App\Account::where('user_id', $id)->where('status', 'debit')->sum('amount');

    if ($balance) {
        return round($balance);
    } else {
        $balance = 0;
    }
}


function availComrade($sp_id, $cate_id)
{
    $comrade = \App\Models\service_providers_comrads::where('s_id', $sp_id)->where('category', $cate_id)->get();

    return $comrade;
}


function base64_to_image($base64_string, $output_file)
{
    // open the output file for writing
    $output_file = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$output_file;
    $ifp = fopen($output_file, 'wb');

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);

    // we could add validation here with ensuring count( $data ) > 1
    fwrite($ifp, base64_decode($data[1]));

    // clean up the file resource
    fclose($ifp);

    return $output_file;
}
