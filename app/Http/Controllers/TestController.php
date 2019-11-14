<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        $user = Auth::user();
        $param = ['usericon' => $user->imgpath];
        return view('test/testimg',$param);
    }
}
