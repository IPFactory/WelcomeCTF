<?php

namespace App\Http\Controllers\User;

use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Problem as Problem;


class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function getUser () {
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
        return $request = Problem::selectRaw(
            'distinct users.name as user, count(*) as solved, sum(problems.point) as point, CEILING(sum(problems.point)/500) AS rank'
            )
        ->join('activeLogs','activeLogs.problem_id', '=', 'problems.id')
        ->join('users','activeLogs.user_id','=','users.id')
        ->where('users.id',$this->user->id)->groupBy('users.id')->get();
    }


}
