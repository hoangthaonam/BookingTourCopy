<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            return redirect()->route('admin.dashboard');
        }
        return view('Admin.Login');
    }

    public function login(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            if(Auth::user()->isAdmin()){
                return redirect()->route('admin.dashboard');
            } else{
                Session::flash('Error','You cannot access to admin page!');
                return redirect()->route('admin.showlogin');
            }
        }
        Session::flash('Error','Incorrect username or password');
        return redirect()->route('admin.showlogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.showlogin');
    }
}
