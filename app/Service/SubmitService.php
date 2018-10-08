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


    public function __construct ($user, $request){
        $this->user     = $user;
        $this->request  = $request;
    }


    public function submit ($problemId) {             //サブミット

        try {
            $find = ActiveLog::where([ ['problem_id',$problemId], ['user_id', $this->user->id ] ])->get();
            if( !empty($find[0]) ) {
                return false;
            }

            //アクティブログに書き込み
            ActiveLog::insert([
                'user_id'       =>  $this->user->id,
                'problem_id'    =>  $problemId,
                'is_open'       =>  0,
                'is_solve'      =>  1
            ]);

        } catch (PDOException $e) {

            return false;

        }
        return true;
    }

    public function flagVerifi ($problemId) {   //フラグ検証

        try {
            //数値の取り間違え防止
            if( !preg_match("/^[0-9]*$/",$problemId) ) {
                return false;
            }

            //IDの存在確認
            if ( !Problem::find($problemId) ){
                return false;
            }

            //flagの形式確認
            if ( !preg_match("/^(welcomeCTF)\{[\s\w\W]{1,}\}$/",$this->request->flag) ) {
                return false;
            }

            //flagの存在確認
            $flag   = Flag::where('correct_flag',$this->request->flag)->select('correct_flag')->get();
            $flag   = $flag[0]->correct_flag;

            if ( !$flag ) {
                return false;
            }

            //文字列の比較
            if ( strcmp($flag, $this->request->flag) ) {
                return false;
            }

        } catch (PDOException  $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function regularly ($problemId) {          //ポイントの定期更新

        //アクティブログの総ポイントを取得
        $point =
        Problem::selectRaw('sum(Problems.point) as point')
                ->join('ActiveLogs','ActiveLogs.problem_id', '=', 'Problems.id')
                ->join('Users','ActiveLogs.user_id','=','Users.id')
                ->where('Users.id',$this->user->id)->groupBy('Users.id')->get();

        try {

            $userScore = Submit::find($this->user->id);

            if ( !$userScore ) {
                //もしユーザーが存在しなかった場合、ユーザーを制作
                $newScore           = new Submit;

                $newScore->id       = $this->user->id;
                $newScore->point    = 0;

                $newScore->save();
                $userScore = $newScore;

            }

            $userScore->point = $point[0]->point;
            $userScore->save();

        } catch (PDOException  $e) {

            return false;

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
        return  false ;

    }
}
