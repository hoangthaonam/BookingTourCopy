<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tour;

class HomeController extends Controller
{
    public function index()
    {
        $tours = Tour::with('category')->get();
        return view('User.Home',compact('tours'));
    }
    public function store()
    {
        # code
    }
}
