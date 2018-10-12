<?php

namespace App\Service;

use Carbon\Carbon;
use App\Model\Problem as Problem;
use App\Model\ActiveLog as ActiveLog;

class ProblemService
{

    private $user;

    public function __construct ($user) {

        $this->user = $user;
    }

    public function getInfo ($id) {
/*
        if( !preg_match("/^[0-9]{,3}$/",$id) ) {

            return response()->json(['error' => '指定した問題番号がInt型ではない。' ], 404);

        }
*/
        if(self::ctfStartDate()){
            return response()->json(['error' => 'Do Not CTF'], 412);
        }
        $response = Problem::leftJoin('Problem_files', 'Problems.id', '=', 'Problem_files.id')
                    ->join('Category', 'Problems.category', '=', 'Category.id')
                    ->join('Author', 'Problems.author_id', '=', 'Author.id')
                    ->where([ ['Problems.id', '=', $id ] ])
                    ->selectRaw('
                        Problems.id id,
                        title,
                        point,
                        Category.category category,
                        statement,
                        hint,
                        Author.name name,
                        Author.link twitter,
                        Problem_files.first_data file1,
                        Problem_files.second_data file2,
                        ('.ActiveLog::where([
                            ['problem_id','=',$id]
                        ])->count().') AS count,
                        ('.ActiveLog::where([
                            ['problem_id','=',$id],
                            ['user_id','=',$this->user]
                        ])->limit(1)->count().') AS isSolve
                    ');

        return $response->get();
    }

    public function getList () {
        if(self::ctfStartDate()){
            return response()->json(['error' => 'Do Not CTF '], 412);
        }
        $sub_query =ActiveLog::select('problem_id', 'user_id')->where('user_id', $this->user)->orderBy('problem_id', 'ASC');

        $response  =Problem::selectRaw('
                        Problems.id,
                        Problems.title,
                        Problems.point,
                        Category.category,
                        ( CASE WHEN userSolve.problem_id IS NOT NULL THEN 1 ELSE 0 END ) AS isSolve
                    ')
                    ->join('Category', 'Category.id', '=', 'Problems.category')->orderBy('Problems.id', 'ASC')
                    ->leftJoin(\DB::raw("({$sub_query->toSql()}) AS userSolve"),'userSolve.problem_id', '=', 'Problems.id');

        return $response->mergeBindings($sub_query->getQuery())->get();

    }


    public function getListCate ($category) {
        if(self::ctfStartDate()){
            return response()->json(['error' => 'Do Not CTF '], 412);
        }
        switch ( strtolower($category) ) {
            case strtolower('Misc'):
                $cateId = 1;
                break;
            case strtolower('FOR'):
                $cateId = 2;
                break;
            case strtolower('Crypt'):
                $cateId = 3;
                break;
            case strtolower('Web'):
                $cateId = 4;
                break;
            case strtolower('PPC'):
                $cateId = 5;
                break;
            case strtolower('Net'):
                $cateId = 6;
                break;
            case strtolower('bin'):
                $cateId = 7;
                break;
            case strtolower('Pwn'):
                $cateId = 8;
                break;
            default:
                $cateId = 0;
                break;
        }
        if (!$cateId) {
            return $this->getList();
        }
        $sub_query =ActiveLog::select('problem_id', 'user_id')->where('user_id', $this->user)->orderBy('problem_id', 'ASC');

        $response  =Problem::selectRaw('
                        Problems.id,
                        Problems.title,
                        Problems.point,
                        Category.category,
                        ( CASE WHEN userSolve.problem_id IS NOT NULL THEN 1 ELSE 0 END ) AS isSolve
                    ')
                    ->join('Category', 'Category.id', '=', 'Problems.category')->orderBy('Problems.id', 'ASC')
                    ->leftJoin(\DB::raw("({$sub_query->toSql()}) AS userSolve"),'userSolve.problem_id', '=', 'Problems.id');

        return $response->mergeBindings($sub_query->getQuery())->where( [ ['Category.id', "=", $cateId] ] )->get();

    }

    private function ctfStartDate () {
        $start_date = Carbon::parse($_ENV['CTF_START_DATE'])->setTimezone($_ENV['TIME_ZONE'])->subHour(9);
        $end_date   = Carbon::parse($_ENV['CTF_END_DATE'])->setTimezone($_ENV['TIME_ZONE'])->subHour(9);
        $now_date   = Carbon::now()->setTimezone($_ENV['TIME_ZONE'])->subHour(9);
/*

        echo var_dump($start_date->timestamp > $now_date->timestamp)."<br>";
        echo var_dump($now_date->timestamp > $end_date->timestamp)."<br>";
        echo $start_date->timestamp."<br>".$end_date->timestamp."<br>".$now_date->timestamp."<br>";
*/
        if ( $start_date > $now_date || $now_date > $end_date ) {
            return 1;
        }
        return 0;
    }

}
