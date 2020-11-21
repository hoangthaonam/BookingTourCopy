<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('User.Register');
    }

    public function store(RegisterRequest $request)
    {
        $password = bcrypt($request->password);
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        if ($request->file('image')->isValid()){
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('upload',$file_name);
        }
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('home.index');
    }
}
