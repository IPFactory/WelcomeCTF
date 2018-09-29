<?php
use Faker\Generator as Faker;
use App\Model\User;
use App\Model\Problem;
use App\Model\ActiveLog;
use Carbon\Carbon;

$factory->define(App\Model\ActiveLog::class, function (Faker $faker) {
    while ( 1 ) {
        $userId         =   rand( 1, User::count() );
        $problemId      =   rand( 1, Problem::count() );
        if (ActiveLog::where([["user_id",$userId],["problem_id",$problemId]])->get()->isEmpty()) {
            print( 'ないで : ' );
            break;
        } else {
            print( 'あるで : ' );
        }
    }
    $testSequence = ActiveLog::where('user_id', $userId)->orderBy('created_at', 'DESC')->limit(1)->get(['created_at']);
    if ( !$testSequence->isEmpty() ) {
        $testCaseMinits = Carbon::parse( $testSequence[0]->created_at );
        $addMin = rand(6, 30);
        if ( $testCaseMinits->lte( Carbon::parse( $testSequence[0]->created_at )->addMinute( $addMin ) ) ) {
            $created_at = Carbon::parse( $testSequence[0]->created_at )->addMinute( $addMin );
        } else {
            $created_at = Carbon::parse( $testSequence[0]->created_at )->addHour()->addMinute( $addMin );
        }
    } else {
        $created_at = Carbon::parse( '2018-07-31 11:00:00' );
    }

    print("ユーザーID : ".$userId ."; 問題ID : ".$problemId ."\n");
    return [
        'user_id'   =>  $userId,
        'problem_id'=>  $problemId,
        'is_open'   =>  rand(0,1),
        'is_solve'  =>  1,
        'created_at'=>  $created_at,
    ];
});
