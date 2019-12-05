<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Competition extends Model
{
    //
    protected $table = 'competitions';

    protected $guarded = array('id');

    //バリデーションルール
    public static $rules = [
        'user_id' => 'required | integer',
        'name' => 'required',
    ];

    /**
     * 存在しない大会のidが来た場合、'/'へリダイレクト
     */
    public static function selectId(int $id):bool
    {
        # code...
        $competitions = DB::select(
            'SELECT id FROM competitions WHERE id = ?',
            [$id]
        );
        return $competitions != null;
    }
}
