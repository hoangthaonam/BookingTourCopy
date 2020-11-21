<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        return view('Admin.Login');
    }

    public function login(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('home.index');
        }
        Session::flash('Error','Incorrect username or password');
        return redirect()->route('showlogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('showlogin');
    }
}
