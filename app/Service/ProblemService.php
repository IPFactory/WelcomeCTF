<?php

namespace App\Service;

use JWTAuth;
use Illuminate\Http\Request;
use App\Model\User as User;
use App\Model\Problem as Problem;
use App\Model\ActiveLog as ActiveLog;
use Tymon\JWTAuth\Exceptions\JWTException;

class ProblemService
{

    private $request;
    private $user;

public function __construct ($user/*,Request $request*/){
        //$this->request  =   $request;
        $this->user     =   $user;
    }
    /*
    *   Preparation
    *
    *   Info : getInfo SQL
    // TODO: これを実行したい
SELECT
problems.id id,title,point,category.category category,statement,hint,author.name name,author.link twitter,problem_files.first_data file1,problem_files.second_data file2,
(SELECT count(*) FROM activeLogs WHERE problem_id = 1) AS count,
(SELECT count(*) FROM activeLogs WHERE user_id = 1 AND problem_id = 1 LIMIT 1) AS isSolve
FROM problems
INNER JOIN category         ON problems.category    = category.id
INNER JOIN author           ON problems.author_id   = author.id
LEFT OUTER JOIN problem_files    ON problems.id          = problem_files.id
WHERE problems.id = 1;
    *
    */
public function getInfo ($id) {
        $response  =   Problem::leftJoin('problem_files','problems.id','=','problem_files.id')
                           ->join('category',   'problems.category',    '=', 'category.id')
                           ->join('author',     'problems.author_id',   '=', 'author.id')
                           ->where([ ['problems.id', '=', $id ] ])
                           ->selectRaw(
                'problems.id id,title,point,category.category category,statement,hint,author.name name,
                 author.link twitter,problem_files.first_data file1,problem_files.second_data file2,
                ('.ActiveLog::where([ ['problem_id','=',$id] ])->count().') AS count,
                ('.ActiveLog::where([ ['problem_id','=',$id], ['user_id','=',$this->user] ])->limit(1)->count().') AS isSolve');
        return $response->get();
    }
    /*
    * Info : getList
    *
    SELECT
        problems.id,
        problems .title,
        problems.point,
        category.category,
        (
        CASE
            WHEN userSolve.problem_id IS NOT NULL THEN 1
            ELSE 0
        END
        ) AS isSolve
    from
        problems
    LEFT OUTER JOIN
        (SELECT problem_id , user_id FROM activeLogs WHERE user_id = 1 ORDER BY problem_id ASC) AS userSolve ON userSolve.problem_id = problems.id
    INNER JOIN
        category ON category.id = problems.category
    ORDER BY problems.id ASC;
    */

    public function getList () {
        $sub_query = ActiveLog::select('problem_id' , 'user_id')->where('user_id',$this->user)->orderBy('problem_id','ASC');
        $respons = Problem::selectRaw(
            'problems.id, problems .title, problems.point, category.category,
            ( CASE WHEN userSolve.problem_id IS NOT NULL THEN 1 ELSE 0 END ) AS isSolve')
        ->join('category','category.id','=','problems.category')->orderBy('problems.id','ASC')
        ->leftJoin(\DB::raw('({$sub_query->toSql()}) AS userSolve'),'userSolve.problem_id', '=', 'problems.id');

        return $respons->mergeBindings($sub_query->getQuery())->get();
    }

}
