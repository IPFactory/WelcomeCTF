<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;

class ProblemController extends Controller
{
    public function getTopProblemsData(){
        /*test case:*/
        $genre=[0=>"rev",1=>"pwn",2=>"web",3=>"crypt",4=>"misc",5=>"net",6=>"fore"];
        $array=[];
        for($i=1;$i<=21;$i++){
            $list=[
                    "problem_id"=>$i,
                    "category"=>$genre[rand(0,6)],
                    "point"=>round(rand(10,300),-1),
                    "name"=>str_random(rand(5,20)),
                    "statement"=>str_random(rand(10,30))."\n".str_random(rand(10,30))."\n".str_random(rand(10,30)),
                    "solve"=>rand(0,1),
                    "solveNoP"=>rand(0,100)
            ];
            array_push($array,$list);
        }
        $ret=json_encode($array);
        return $ret;
    }

    public function getProblemData(Request $request){
        /*test case:*/
        $genre=[0=>"rev",1=>"pwn",2=>"web",3=>"crypt",4=>"misc",5=>"net",6=>"fore"];
        $kaku=[0=>".zip",1=>".tar",2=>".jpg",3=>".png"];
        $list=[
                "problem_id"=>rand(0,40),
                "category"=>$genre[rand(0,6)],
                "point"=>round(rand(10,300),-1),
                "name"=>str_random(rand(5,20)),
                "statement"=>str_random(rand(10,30))."\n".str_random(rand(10,30))."\n".str_random(rand(10,30)),
                "hint"=>str_random(rand(10,20))."\n".str_random(rand(5,20))."\n".str_random(rand(10,20)),
                "solve"=>rand(0,1),
                "file1"=>"http://".str_random(rand(3,7)).".com/".str_random(rand(5,10)).$kaku[rand(0,3)],
                "file2"=>"http://".str_random(rand(3,7)).".com/".str_random(rand(5,10)).$kaku[rand(0,3)],
                "solveNoP"=>rand(0,100)
        ];
        $ret=json_encode($list);
        return $ret;
    }

    public function postFlagSolve(Request $request){
        /*test case:*/
        $ret=rand(0,1);
        return $ret;
    }
}
