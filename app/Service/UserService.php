<?php

namespace App\Service;

use JWTAuth;
use Illuminate\Http\Request;
use App\Model\User      as User;
use App\Model\Problem   as Problem;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Category  as Category;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserService
{

    private $request;
    private $user;

    public function __construct ($user/*,Request $request*/){
        //$this->request  =   $request;
        $this->user     =   $user;
    }

    /*
    *
    sumPoint = SELECT SUM(point) FROM problems WHERE id IN ( SELECT problem_id FROM ActiveLogs WHERE user_id = $this->user->id )

    SELECT
        ( sumPoint ) AS sumPoint,
        ( CEILING( ( sumPoint )/500 ) ) AS Rank ,
        ( SELECT count(id) FROM activelogs WHERE user_id = $this->user->id ) AS SolveCount ,
        name
    FROM
        users
    WHERE
        id = $this->user->id;
    *
    */
    public function getInfo () {
        return Problem::selectRaw(
            'distinct users.name as user, count(*) as solved, sum(problems.point) as point, CEILING(sum(problems.point)/500) AS rank'
            )
        ->join('activeLogs','activeLogs.problem_id', '=', 'problems.id')
        ->join('users','activeLogs.user_id','=','users.id')
        ->where('users.id',$this->user->id)->groupBy('users.id')->get();
    }

    public function getPei () {
        $response = [];
        $categorys =Category::get(['category']);
        foreach ($categorys as $key => $value) {
            $ActiveLog = ActiveLog::join('problems','problems.id','=','ActiveLogs.problem_id')->join('category','category.id','=','problems.category')->where('user_id','=',$this->user->id);
            $response[$value->category] = $ActiveLog->where('category.category','=',$value->category)->count();
        }
        return $response;
    }

    public function getList () {
        $sub_query  =   ActiveLog::selectRaw('is_solve, problem_id')->where('user_id','=',$this->user->id);
        return Problem::selectRaw('problems.id AS id, problems.title AS title, solveds.is_solve AS isSolve, problems.point, category.category AS genre')
        ->join('category','category.id','=','problems.category')
        ->leftJoin(\DB::raw("({$sub_query->toSql()}) AS solveds"),'solveds.problem_id', '=', 'problems.id')
        ->orderBy('problems.id','ASC')->mergeBindings($sub_query->getQuery())->get();
    }
    /*
    SELECT      users.name AS name, SUM(problems.point) AS point
    FROM        ActiveLogs
    INNER JOIN  problems ON problems.id = ActiveLogs.problem_id
    INNER JOIN  Users    ON users.id    = ActiveLogs.user_id
    GROUP BY    activelogs.user_id
    ORDER BY    point DESC;

    SELECT      users.name, SUM(problems.point)
    FROM        ActiveLogs
    INNER JOIN  problems ON problems.id = ActiveLogs.problem_id
    INNER JOIN  Users    ON users.id    = ActiveLogs.user_id
    WHERE       users.id = 1
    GROUP BY    activelogs.user_id HAVING activelogs.user_id = 1;

    */
    public function getRanking () {
        return ActiveLog::selectRaw('users.name AS name, SUM(problems.point) AS point')
            ->join('problems','problems.id','=','ActiveLogs.problem_id')
            ->join('Users','users.id','=','ActiveLogs.user_id')
            ->groupBy('activelogs.user_id')
            ->orderBy('point','DESC')
            ->get();
    }

}
