<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WinningNo;

class WinningNoController extends Controller
{
    //
    /**
     *
     */
    public function index(Request $request)
    {
        # code...
    }

    public function management(Request $request)
    {
        # code...
        $id = $request->id;

        $param = [
            'competition_id' => $id,
        ];

        return view('winningNomanagement',$param);
    }


}
