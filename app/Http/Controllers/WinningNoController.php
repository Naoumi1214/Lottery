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

    /**
     * 当選番号の管理画面に遷移する
     */
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

    /**
     * 個別当選
     */
    public function FunctionName(Request $request)
    {
        # code...

    }
}
