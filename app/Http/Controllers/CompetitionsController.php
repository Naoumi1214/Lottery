<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Competition;

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
        $this->validate($request, Competition::$rules);

        $overview = $request->overview;
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
}
