<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinningNo extends Model
{
    //
    protected $table = 'winning_nos';

    protected $guarded = array('id');

    //バリデーションルール
    public static $rules = [
        'winning_type_id' => 'required | integer',
        'competition_id' => 'required | integer',
        'no' => 'integer',
        'maxno' => 'integer'
    ];


}
