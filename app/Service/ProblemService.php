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
        $problems =
        Problem::where([ ["problems.id",$id] ])
        ->leftJoin("problem_files","problems.id","=","problem_files.id")
        ->join("category","problems.category","=","category.id")
        ->join("author","problems.author_id","=","author.id")
        ->select(
        "problems.id AS id","title","point","category.category AS category","statement","hint","author.name AS author","author.link AS twitter","problem_files.first_data AS file1","problem_files.second_data AS file2"
        )
        ->get();
        // TODO: 今度見やすく
        try{
            $respons = [
                "id"        =>$problems[0]->id,
                "title"     =>$problems[0]->title,
                "point"     =>$problems[0]->point,
                "category"  =>$problems[0]->category,
                "solveCount"=>ActiveLog::where("problem_id","=",$id)->count(),
                "isSolve"   =>ActiveLog::where([["problem_id","=",$id],["user_id","=",$this->user]])->limit(1)->count(),
                "statement" =>$problems[0]->statement,
                "hint"      =>$problems[0]->hint,
                "author"    =>$problems[0]->author,
                "twitter"   =>$problems[0]->twitter,
                "file1"     =>$problems[0]->file1,
                "file2"     =>$problems[0]->file2,
            ];
        } catch (\Exception $e){
            $respons=[['error' => 'non id'], 401];
        }
        return $respons;
    }
    /*
    * Info : getList
    *
    SELECT problems.id id,title,point,category.category category
    FROM problems INNER JOIN category ON problems.category = category.id;
    */
    public function getList () {
        $problems = Problem::join("category","problems.category","=","category.id")
        ->select("problems.id AS id","title","point","category.category AS category")
        ->get();
        $respons = [];
        foreach ($problems as $problem) {
            array_push($respons,
                [
                    "id"        => $problem->id,
                    "title"     => $problem->title,
                    "category"  => $problem->category,
                    "title"     => $problem->title,
                    "point"     => $problem->point,
                    "isSolve"   => ActiveLog::where([["problem_id","=",$problem->id],["user_id","=",$this->user]])->limit(1)->count()
                ]
            );
        }
        return $respons;
    }

}
