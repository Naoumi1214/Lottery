<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    /**
     * "/"のgetメソッド
     */
    public function index(Request $request)
    {
        # code...
    }

    /**
     *
     */
    public function create(Request $request)
    {
        # code...
        return view('createCompetitions');
    }

    public function insert(Request $request)
    {
        # code...
        $param = [
            'name' => $request->name,
            'overview' => $request->overview,
            'icon' => $request->icon
        ];
        return response()->json($param);
    }
}
