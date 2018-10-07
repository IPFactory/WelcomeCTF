<?php

namespace App\Service;

use App\Model\Problem   as Problem;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Category  as Category;

class UserService
{

    private $user;

    public function __construct ($user){

        $this->user = $user;

    }

    public function getInfo () {

        return  Problem::selectRaw(
                    'distinct Users.name as user,
                    count(*) as solved,
                    sum(Problems.point) as point,
                    CEILING(sum(Problems.point)/500) AS rank'
                )
                ->join('ActiveLogs','ActiveLogs.problem_id', '=', 'Problems.id')
                ->join('Users','ActiveLogs.user_id','=','Users.id')
                ->where('Users.id',$this->user->id)->groupBy('Users.id')->get();

    }

    public function getPei () {

        $response   = [];

        $categorys  = Category::get(['category']);

        foreach ($categorys as $key => $value) {
            $ActiveLog = ActiveLog::join('Problems','Problems.id','=','ActiveLogs.problem_id')
                        ->join('Category','Category.id','=','Problems.category')
                        ->where('user_id','=',$this->user->id);
            $response[$value->category] = $ActiveLog->where('Category.category','=',$value->category)->count();
        }

        return $response;

    }

    public function getList () {

        $sub_query  =   ActiveLog::selectRaw('is_solve, problem_id')->where('user_id','=',$this->user->id);

        return  Problem::selectRaw(
                    'Problems.id AS id,
                    Problems.title AS title,
                    solveds.is_solve AS isSolve,
                    Problems.point,
                    Category.category AS genre'
                )
                ->join('Category','Category.id','=','Problems.category')
                ->leftJoin(\DB::raw("({$sub_query->toSql()}) AS solveds"),'solveds.problem_id', '=', 'Problems.id')
                ->orderBy('Problems.id','ASC')->mergeBindings($sub_query->getQuery())
                ->get();

    }

    public function getRanking () {

        return  ActiveLog::selectRaw('Users.name AS name, SUM(Problems.point) AS point')
                ->join('Problems', 'Problems.id','=','ActiveLogs.problem_id')
                ->join('Users','Users.id','=','ActiveLogs.user_id')
                ->groupBy('ActiveLogs.user_id')
                ->orderBy('point','DESC')
                ->get();

    }

}
