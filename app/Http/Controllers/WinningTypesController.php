<?php

namespace App\Http\Controllers;

use App\WinningType;
use App\Competition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WinningTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user_id = Auth::id();
        $competition_id = $request->id;

        $param = ['competition_id' => $competition_id];
        //DB::select('', [1]);
        return view('/createWinningType', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WinningType  $winningType
     * @return \Illuminate\Http\Response
     */
    public function show(WinningType $winningType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WinningType  $winningType
     * @return \Illuminate\Http\Response
     */
    public function edit(WinningType $winningType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WinningType  $winningType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WinningType $winningType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WinningType  $winningType
     * @return \Illuminate\Http\Response
     */
    public function destroy(WinningType $winningType)
    {
        //
    }
}
