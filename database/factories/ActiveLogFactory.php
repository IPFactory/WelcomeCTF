<?php

use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Problem;
use App\Model\ActiveLog;

$factory->define(App\Model\ActiveLog::class, function (Faker $faker) {
    while ( 1 ) {
        $userId         =   rand(1,User::count());
        $problemId      =   rand(1,Problem::count());
        if (ActiveLog::where([["user_id",$userId],["problem_id",$problemId]])->get()->isEmpty()) {
            print( "ないで : ");
            break;
        }else {
            print( "あるで : ");
        }
    }
    print("ユーザーID : ".$userId ."; 問題ID : ".$problemId ."\n");
    return [
        'user_id'   =>  $userId,
        'problem_id'=>  $problemId,
        'is_open'   =>  rand(0,1),
        'is_solve'  =>  1,
    ];
});
