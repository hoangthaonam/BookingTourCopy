<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo,$provider); 
        auth()->login($user); 
        return redirect()->to('/home');
    }
    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::where('email', $getInfo->email)->first();
            if(!$user){
                $user = User::create([
                    'username' => $getInfo->email,
                    'email'    => $getInfo->email,
                    'password' => bcrypt('123456'),
                    'name'     => $getInfo->name,
                    'address'  => 'unknow',
                    'phone'  => 'unknow',
                    'image' => 'default',
                    'provider' => $provider,
                    'provider_id' => $getInfo->id
                ]);
            }
        }
        return $user;
    }
}
