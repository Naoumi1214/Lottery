<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Facades\DB;

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
        'maxno' => 'integer',
        'minno' => 'integer',
    ];

    /**
     * 乱数を生成
     * 重複が認められない場合は、重複の確認をしながら、乱数を生成する
     */
    public function createRamdomNo(bool $duplicate, int $maxno, int $winning_type_id): int
    {
        # code...
        //重複してもいいか？
        if ($duplicate) {
            # code...
            return rand(0, intval($maxno));
        } else {
            # code...
            //対象の当選種類
            $winningNos = DB::select(
                'SELECT * FROM winning_types types,winning_nos nos
                 WHERE types.id = ?
                 AND types.id = nos.winning_type_id',
                [$winning_type_id]
            );
            //dd($winningNos);

            //重複がなくなるまで
            $notduplicate = false;
            while (!$notduplicate) {
                # code...
                $notduplicate = true;

                //乱数を生成
                $no = rand(0, intval($maxno));

                //重複が無いか確認
                foreach ($winningNos as $winningNo) {
                    # code...
                    if ($winningNo === $no) {
                        $notduplicate = false;
                        break;
                    }
                }
            }

            return $no;
        }
    }
}
