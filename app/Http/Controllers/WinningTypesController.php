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
        $competition_id = $request->id;

        //対象の大会の当選種類を取り出す
        $winning_typesObj = DB::table('winning_types')
            ->where('competition_id', $competition_id)
            ->orderBy('maxNumberOfPeople')
            ->get();

        $param = [
            'competition_id' => $competition_id,
            'winning_typesObj' => $winning_typesObj
        ];

        return view('/createWinningType', $param);
    }

    /**
     * Show the form for creating a new resource.
     *  当選種類をinsert
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->validate($request, WinningType::$rules);

        $param = [
            'competition_id' => intval($request->competition_id),
            'name' => $request->name,
            'maxNumberOfPeople' => intval($request->maxNumberOfPeople)
        ];
        //var_dump($param);

        $winningType = new WinningType();
        $winningType->fill($param)->save();

        return redirect("/winningTypeManager/{$request->competition_id}");
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
     *  当選種類の更新自体をする
     * @param  \App\WinningType  $winningType
     * @return \Illuminate\Http\Response
     */
    public function edit(WinningType $winningType, Request $request)
    {
        //
        //dd($request->all());
        $this->validate($request, WinningType::$update_rules);

        $winningType = WinningType::find($request->id);
        $winningType->fill($request->all())->save();

        return redirect("/winningTypeManager/{$winningType->competition_id}");
    }

    /**
     * Update the specified resource in storage.
     *  当選種類の更新画面へ遷移する
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WinningType  $winningType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WinningType $winningType)
    {
        //
        $winningType = WinningType::find($request->id);

        $param = [
            'winningType' => $winningType
        ];

        return view('updateWinningType', $param);
    }

    /**
     * Remove the specified resource from storage.
     * 当選種類の削除
     * @param  \App\WinningType  $winningType
     * @return \Illuminate\Http\Response
     */
    public function destroy(WinningType $winningType,Request $request)
    {
        //
        intval($request->id);

        WinningType::destroy($request->id);
    }
}
