<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    //
    protected $table = '_competitions';

    protected $guarded = array('id', 'user_is');

     //バリデーションルール
     public static $rules = [
         'user_id' => 'integer',
        'name' => 'required',
    ];
}
