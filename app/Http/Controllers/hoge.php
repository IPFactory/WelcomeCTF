<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use nesbot\carbon;
use App\Model\User      as User;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Problem   as Problem;
use App\Model\Category  as Category;
use App\Service\ProblemService as ProblemService;


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
        $this->ProblemService =   new ProblemService(1);
        $this->ProblemService->time();
    }
}
