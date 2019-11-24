<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\WinningNo;
use App\WinningType;

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

        $winningtypes = DB::table('winning_types')
            ->where('competition_id', $id)
            ->orderBy('maxNumberOfPeople')
            ->orderBy('name')->get();

        $param = [
            'competition_id' => $id,
            'winningtypes' => $winningtypes
        ];

        return view('winningNomanagement', $param);
    }


}
