<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Competition;
use Illuminate\Support\Facades\Auth;

class CompetitionsController extends Controller
{
    /**
     * "/"のgetメソッド
     * ホーム画面に行く
     */
    public function index(Request $request)
    {
        # code...
        //大会を主催を始めた降順に５個ずつ取り出す
        $competitions = Competition::orderBy('created_at', 'DESC')->paginate(5);
        //var_dump($competitions);
        return view('home', ['competitions' => $competitions]);
    }

    /**
     *  "/create"
     *  大会の主催登録ページに行く
     */
    public function create(Request $request)
    {
        # code...
        return view('createCompetitions');
    }

    /**
     * 大会の主催を登録する
     */
    public function insert(Request $request)
    {
        # code...
        $this->validate($request, Competition::$rules);

        $overview = $request->overview;
        //概要がかかれていない場合、空文字列にする
        if ($overview === null) {
            # code...
            $overview = ' ';
        }

        $param = [
            'user_id' => intval($request->user_id),
            'name' => $request->name,
            'overview' => $overview,
        ];

        //DB::insert('INSERT INTO _competitions (user_id,name,overview) VALUES ("?","?","?")', $param);
        $competition = new Competition();
        $competition->fill($param)->save();

        return redirect('/');
    }

    /**
     * "/my"
     * 自分が主催した大会の一覧
     */
    public function my(Request $request)
    {
        # code...
        //ログインしてるユーザーのidを取り出す
        $user = Auth::user();
        $user_id = intval($user->id);

        $competitions = DB::table('_competitions')
            ->where('user_id', $user_id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);

        $param = ['competitions' => $competitions];
        return view('/my', $param);
    }

    public function details(Request $request)
    {
        # code...
        $competition_id = intval($request->id);
        $competition = DB::table('_competitions')
            ->where('id', $competition_id)->first();

        $param = [
            'id' => $competition->id,
            'user_id' => $competition->user_id,
            'name' => $competition->name,
            'overview' => $competition->overview,
            'icon' => $competition->icon
        ];
        //var_dump($param);
        return view('/details',$param);
    }
}
