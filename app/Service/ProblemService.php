<?php

namespace App\Service;

use App\Model\Problem as Problem;
use App\Model\ActiveLog as ActiveLog;

class ProblemService
{

    private $user;

    public function __construct ($user){
        $this->user = $user;
    }

    public function getInfo ($id) {
        $response = Problem::leftJoin('problem_files', 'problems.id', '=', 'problem_files.id')
                    ->join('category', 'problems.category', '=', 'category.id')
                    ->join('author', 'problems.author_id', '=', 'author.id')
                    ->where([ ['problems.id', '=', $id ] ])
                    ->selectRaw(
                        'problems.id id,title,point,category.category category,statement,hint,author.name name,
                        author.link twitter,problem_files.first_data file1,problem_files.second_data file2,
                        ('.ActiveLog::where([ ['problem_id','=',$id] ])->count().') AS count,
                        ('.ActiveLog::where([ ['problem_id','=',$id], ['user_id','=',$this->user] ])->limit(1)->count().') AS isSolve'
                    );
        return $response->get();
    }

    public function getList () {
        $sub_query =ActiveLog::select('problem_id', 'user_id')->where('user_id', $this->user)->orderBy('problem_id', 'ASC');
        $response  =Problem::selectRaw(
                        'problems.id, problems .title, problems.point, category.category,
                        ( CASE WHEN userSolve.problem_id IS NOT NULL THEN 1 ELSE 0 END ) AS isSolve'
                    )
                    ->join('category', 'category.id', '=', 'problems.category')->orderBy('problems.id', 'ASC')
                    ->leftJoin(\DB::raw("({$sub_query->toSql()}) AS userSolve"),'userSolve.problem_id', '=', 'problems.id');
        return $response->mergeBindings($sub_query->getQuery())->get();
    }

}
