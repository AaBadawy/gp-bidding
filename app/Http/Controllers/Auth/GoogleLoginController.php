<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver("google")->redirect();
    }

    public function providerCallback(){
        try{
            $social_user = Socialite::driver("google")->user();

            // First Find Social Account
            $account = SocialAccount::where([
                'provider_name'=>"google",
                'provider_id'=> $social_user->getId()
            ])->first();

            // If Social Account Exist then Find User and Login
            if($account){
                auth()->login($account->user);
                return redirect()->route('main');
            }

            // Find User
            $user = User::where([
                'email'=>$social_user->getEmail()
            ])->first();

            // If User not get then create new user
            if(!$user){
                $user = User::create([
                    'email'=>$social_user->getEmail(),
                    'name'=>$social_user->getName()
                ]);
            }

            // Create Social Accounts
            $user->socialAccounts()->create([
                'provider_id'=>$social_user->getId(),
                'provider_name'=>"google"
            ]);

            auth()->login($user);
            return redirect()->route('website.main');

        }catch(\Exception $e){
            return redirect()->route('login');
        }
    }


}
