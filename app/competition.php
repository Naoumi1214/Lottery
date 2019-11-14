<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    //
    protected $table = '_competitions';

    protected $guarded = array('id', 'user_is');

     //バリデーションルール
     public static $rules = [
        'name' => 'required',
        'icon' => ''
    ];
}
