<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\WinningNo;
use App\WinningType;
use App\Competition;

class WinningNoController extends Controller
{
    //
    /**
     *
     */
    public function index(Request $request)
    {
        # code...
        $winning_noObjs = DB::select(
            'SELECT * FROM winning_nos nos, winning_types types
            WHERE nos.competition_id = ?
            AND nos.winning_type_id =  types.id
            ORDER BY types.maxNumberOfPeople , nos.no',
            [$request->id]
        );

        //dd($winningNos);
        $param = [
            'winning_noObjs' => $winning_noObjs
        ];

        return view('winningNo', $param);
    }
    /**
     * 当選番号確認画面へ遷移する
     */
    public function singleNoselect(Request $request)
    {
        # code...
        $id = $request->id;

        $param = [
            'id' => $id
        ];

        return view('singleNoConfirmation', $param);
    }

    /**
     * 当選番号確認にて番号を確認する
     */
    public function singleNoConfirmation(Request $request)
    {
        # code...
        $sqlparam = [
            $request->no,
            $request->id
        ];

        $winning_nos = DB::select(
            'SELECT types.name,nos.no FROM winning_nos nos, winning_types types
            WHERE nos.no = ?
            AND nos.competition_id = ?
            AND types.id = nos.winning_type_id',
            $sqlparam
        );

        //dd($winning_no);

        $param = [
            'winning_nos' => $winning_nos
        ];

        return response()->json($param);
    }

    /**
     * 当選番号の管理画面に遷移する
     */
    public function management(Request $request)
    {
        # code...
        $id = $request->id;

        //当選者数が当選最大当選人数未満の当選種類を取り出す
        $winningtypes = DB::select(
            'SELECT * FROM winning_types types
                                    WHERE types.competition_id = ?
                                    AND types.maxNumberOfPeople >
                                    (
                                        SELECT COUNT(*) FROM winning_nos nos
                                        WHERE nos.competition_id = ?
                                        AND nos.winning_type_id = types.id
                                    )
                                    ORDER BY types.maxNumberOfPeople , types.name',
            [$id, $id]
        );
        //dd($winningtypes);

        //当選番号の番号本体と当選種類名の一覧を取り出す
        $winning_noObjs = DB::select(
            'SELECT nos.id,nos.no , types.name FROM winning_nos nos, winning_types types
                                        WHERE nos.competition_id = ?
                                        AND types.competition_id = ?
                                        AND nos.winning_type_id = types.id
                                        ORDER BY types.maxNumberOfPeople , types.name , nos.no',
            [$id, $id]
        );
        //dd(winning_noObjs);

        $param = [
            'competition_id' => $id,
            'winningtypes' => $winningtypes,
            'winning_noObjs' => $winning_noObjs
        ];

        return view('winningNomanagement', $param);
    }

    /**
     * 個別に番号を決めて当選させる
     */
    public function createSignle(Request $request)
    {
        # code...
        $this->validate($request, WinningNo::$rules);
        Competition::selectId($request->competition_id);

        $param = [
            'winning_type_id' => $request->winning_type_id,
            'competition_id' => $request->competition_id,
            'no' => $request->no
        ];
        //dd($param);

        WinningNo::create($param);

        return redirect('/winningNoManager/' . $request->competition_id);
    }

    /**
     * 当選種類別にランダムに当選させる
     */
    public function createRandom(Request $request)
    {
        # code...
        $this->validate($request, WinningNo::$rules);

        $no = rand(0, intval($request->maxno));

        $param = [
            'winning_type_id' => $request->winning_type_id,
            'competition_id' => $request->competition_id,
            'no' => $no
        ];

        //番号をinsert
        $winningNo = new WinningNo();
        $winningNo->fill($param)->save();
        //dd($winningNo->no);

        //insertした番号の当選種類の名前を取得
        $winningTypes = DB::select(
            'SELECT * FROM winning_types types, winning_nos no
             WHERE types.id = no.winning_type_id
             AND no.id = ?',
            [$winningNo->id]
        );

        return response()->json([
            'id' => $winningNo->id,
            'no' => $winningNo->no,
            'winningType' => $winningTypes[0]
        ]);
    }

    public function createBetweenRandom(Request $request)
    {
        # code...
        $this->validate($request, WinningNo::$rules);

        $no = rand(intval($request->minno), intval($request->maxno));

        $param = [
            'winning_type_id' => $request->winning_type_id,
            'competition_id' => $request->competition_id,
            'no' => $no
        ];

        WinningNo::create($param);

        return redirect('/winningNoManager/' . $request->competition_id);
    }

    /**
     * 当選番号変更画面へ遷移
     */
    public function updateNo(Request $request)
    {
        # code...
        $id = $request->id;
        $targetNo = WinningNo::find($id);

        $param = ['targetNo' => $targetNo];

        return view('updateWinningNo', $param);
    }

    /**
     * 当選番号変更を行う
     */
    public function editNo(Request $request)
    {
        # code...
        $id = $request->id;
        $param = [
            'no' => intval($request->no)
        ];

        $targetNo = WinningNo::find($id);
        $targetNo->fill($param)->save();

        return redirect('/winningNoManager/' . $targetNo->competition_id);
    }
}
