<?php

namespace App\Service;

use App\Model\Problem   as Problem;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Category  as Category;
use App\Model\Flag      as Flag;

class SubmitService {

    private $user;
    private $request;

    public function __construct ($user, $request){
        $this->user     = $user;
        $this->request  = $request;
    }


    public function submit ($problemId) {             //サブミット
        try {

            //アクティブログに書き込み
            ActiveLog::insert([
                'user_id'       =>  $this->user->id,
                'problem_id'    =>  $problemId,
                'is_open'       =>  0,
                'is_solve'      =>  1
            ]);

        } catch (PDOException $e) {

            return response()->json(['error' => '
            An error occurred in submit.
            Please contact the operator if there is an error multiple times.
            '], 401);

        }
        return true;
    }

    public function flagVerifi ($problemId) {   //フラグ検証

        //エラーメッセージ
        $defaultErrorMes= 'There is no problem number like that.';
        $catcheErrorMes = '
        An error occurred in submit.
        Please contact the operator if there is an error multiple times.
        ';

        try {

            //IDの存在確認
            if ( !Problem::find($problemId) ){

                return response()->json(['error' => $defaultErrorMes ], 404);

            }

            //flagの形式確認
            if ( !preg_match("/^(welcomeCTF)\{[\s\w\W]{1,}\}$/",$flag) ) {

                return response()->json(['error' => $defaultErrorMes ], 404);

            }

            //flagの存在確認
            $flag   = Flag::where('correct_flag',$this->request->flag)->select('correct_flag')->get();
            $flag   = $flag[0]->flag;

            if ( !$flag ) {

                return response()->json(['error' => $defaultErrorMes ], 404);

            }

            //文字列の比較
            if ( !strcmp($flag, $this->request->flag) ) {

                return response()->json(['error' => $defaultErrorMes ], 404);

            }

        } catch (PDOException  $e) {

            return response()->json(['error' => $catcheErrorMes ], 401);

        } catch (Exception $e) {

            return response()->json(['error' => $catcheErrorMes], 401);

        }
        return true;
    }

    public function regularly () {          //ポイントの定期更新

        //アクティブログの総ポイントを取得
        $point =
        Problem::selectRaw('sum(Problems.point) as point')
                ->join('ActiveLogs','ActiveLogs.problem_id', '=', 'Problems.id')
                ->join('Users','ActiveLogs.user_id','=','Users.id')
                ->where('Users.id',$this->user->id)->groupBy('Users.id')->get();

        $point = $point[0]->point;
        
        return  ;
    }

    public function tamperPrevention() {    //スコアサーバー改ざん防止(暫定)
        return  ;
    }
}
