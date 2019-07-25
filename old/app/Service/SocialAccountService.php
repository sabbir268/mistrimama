<?php

namespace App\Service;

//use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\Provider;
use App\SocialAccount;
use App\User;
use Image;

class SocialAccountService {

    public function createOrGetUser(Provider $provider) {

        $providerUser = $provider->user();



        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
                ->whereProviderUserId($providerUser->getId())
                ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
              
               // echo $avatar = $providerUser->avatar_original ? $providerUser->avatar_original : $providerUser->getAvatar();
                
                $avatar = $providerUser->getAvatar();
                 
                if ($avatar) {
                    $img = Image::make($avatar);
                    $profile_pic = $providerUser->getId() . ".jpg";

                    $img->fit(400, 400, function ($constraint) {
                        $constraint->upsize();
                    })->save(public_path('images/profile') . '/' . $profile_pic);
                } else {
                    $profile_pic = "profile.jpg";
                }


                $user = User::create([
                            'email' => $providerUser->getEmail(),
                            'name' => $providerUser->getName(),
                            'profile_pic' => $profile_pic,
                            'password' => sha1(time())
                ]);



            }

            $account->user()->associate($user);


            //add user role
            DB::table('user_roles')->insert([
                'user_id' => $user->id,
                'roles_id' =>4
            ]);
            $account->save();

            return $user;
        }
    }

}
