<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User      as User;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Problem   as Problem;
use App\Model\Category  as Category;


class hoge extends Controller
{
    private $user;
    /*
    *
    SELECT problems.id AS id, problems.title AS title, solveds.is_solve AS isSolve, problems.point
    FROM problems
    LEFT JOIN (SELECT is_solve, problem_id FROM activeLogs WHERE user_id = 1) AS solveds ON solveds.problem_id = problems.id
    ORDER BY problems.id ASC;
    *
    */
    public function hoge (Request $Request) {
        $id         =   $Request->id;
        $sub_query  =   ActiveLog::selectRaw('is_solve, problem_id')->where('user_id','=',$id);
        $respons    =   Problem::selectRaw('problems.id AS id, problems.title AS title, solveds.is_solve AS isSolve, problems.point')
        ->leftJoin(\DB::raw("({$sub_query->toSql()}) AS solveds"),'solveds.problem_id', '=', 'problems.id')
        ->orderBy('problems.id','ASC');
        return $respons->mergeBindings($sub_query->getQuery())->get();


    }
}
