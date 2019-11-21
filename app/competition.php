<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
