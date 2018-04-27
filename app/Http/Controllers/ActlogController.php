<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actlog;

class ActlogController extends Controller
{
    public function getMySolveListData(Request $request){
        /*test case:*/
        $problems = [];
        for($i=0;$i<5;$i++){
            $list = [
                "problem_id" => $i,
                "name" => "test_".$i,
                "point" => round(500 * ($i + rand(1,2)) / rand(5,9),-1)
            ];

            array_push($problems,$list);
        }
        $ret = $problems;
        return $ret;
    }
    public function getMySolvePoint(Request $request){
        /*test case:*/
        $list = [
            "rank" => rand(1,50),
            "point" => round(rand(0,3000),-1),
            "soluvecount" => rand(0,100)
        ];
        $ret=json_encode($list);
        return $ret;
    }

    public function getTop10graphData(){
        /*test case:*/
        $ret = json_encode(["non"=>"test_caseの実装もまだ"]);
        return $ret;
    }
    public function getScoreData(){
        /*test case:*/
        $array=[];
        for($i=1;$i<=20;$i++){
            $list=[
                "user_id"=>$i,
                "user"=>str_random(10),
                "point"=>round(rand(0,2000),-1),
                "hint"=>rand(0,10)
            ];
            array_push($array,$list);
        }
        usort($array,function($a,$b){
                return $a["point"]==$b["point"]?0:($a["point"]<$b["point"]);
            });
        $ret = json_encode($array);
        return $ret;
    }
}
