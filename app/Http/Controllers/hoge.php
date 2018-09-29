<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use nesbot\carbon;
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
    public function hoge () {
        return  ActiveLog::where('user_id', 1)->orderBy('created_at', 'DESC')->limit(1)->get(['created_at']);
    }
}
