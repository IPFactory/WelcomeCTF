<?php

namespace App\Service;

use Exception;
use PDOException;
use App\Model\Problem   as Problem;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Category  as Category;
use App\Model\Flag      as Flag;
use App\Model\Submit    as Submit;

class SubmitService
{

    private $user;
    private $request;

    //エラーメッセージ
    const NOT_FOUND = 'There is no problem number like that.';
    const BAD_REQ   = '
    An error occurred in submit.
    Please contact the operator if there is an error multiple times.
    ';

    public function __construct ($user, $request){
        $this->user     = $user;
        $this->request  = $request;
    }


    public function submit ($problemId) {             //サブミット

        try {
            if( gettype($id) != 'integer' ) {

                return response()->json(['error' => NOT_FOUND ], 404);

            }
            //アクティブログに書き込み
            ActiveLog::insert([
                'user_id'       =>  $this->user->id,
                'problem_id'    =>  $problemId,
                'is_open'       =>  0,
                'is_solve'      =>  1
            ]);

        } catch (PDOException $e) {

            return response()->json(['error' => BAD_REQ ], 400);

        }
        return true;
    }

    public function flagVerifi ($problemId) {   //フラグ検証

        try {

            //IDの存在確認
            if ( !Problem::find($problemId) ){

                return response()->json(['error' => NOT_FOUND ], 404);

            }

            //flagの形式確認
            if ( !preg_match("/^(welcomeCTF)\{[\s\w\W]{1,}\}$/",$flag) ) {

                return response()->json(['error' => NOT_FOUND ], 404);

            }

            //flagの存在確認
            $flag   = Flag::where('correct_flag',$this->request->flag)->select('correct_flag')->get();
            $flag   = $flag[0]->flag;

            if ( !$flag ) {

                return response()->json(['error' => NOT_FOUND ], 404);

            }

            //文字列の比較
            if ( !strcmp($flag, $this->request->flag) ) {

                return response()->json(['error' => NOT_FOUND ], 404);

            }

        } catch (PDOException  $e) {

            return response()->json(['error' => BAD_REQ ], 400);

        } catch (Exception $e) {

            return response()->json(['error' => BAD_REQ], 400);

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

        try {

            $userScore = Submit::find($this->user->id);

            if ( !$userScore ) {

                $newScore           = new Submit;

                $newScore->id       = $this->user->id;
                $newScore->point    = 0;

                $newScore->save();
                $userScore = $newScore;

            }

            $userScore->point = $point[0]->point;
            $userScore->save();

        } catch (PDOException  $e) {

            return response()->json(['error' => BAD_REQ ], 400);

        }
        return  true;
    }

    public function tamperPrevention() {    //スコアサーバー改ざん防止(暫定)

        $pointActLog =
        Problem::selectRaw('sum(Problems.point) as point')
                ->join('ActiveLogs','ActiveLogs.problem_id', '=', 'Problems.id')
                ->join('Users','ActiveLogs.user_id','=','Users.id')
                ->where('Users.id',$this->user->id)->groupBy('Users.id')->get();

        $pointScore  = Submit::select('point')->where('id', $this->user->id)->get();

        if ($pointActLog == $pointScore) {
            //処理をどうしよう
        }
        return  null ;

    }
}
