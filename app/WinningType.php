<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WinningType extends Model
{
    //
    protected $table = 'winning_types';

    protected $guarded = array('id');

    //バリデーションルール
    public static $rules = [
        'competition_id' => 'required | integer',
        'name' => 'required',
        'maxNumberOfPeople' => 'required | integer'
    ];
}
