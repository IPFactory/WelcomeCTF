<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ActiveLog;
use App\Model\User;
use App\Model\Problem;

class hoge extends Controller
{
    public function hoge () {
        $userId         =   rand(1,User::count());
        $problemId      =   rand(1,Problem::count());
        $users          =   ActiveLog::where([["user_id",$userId],["problem_id",$problemId]])->get();
        if ($users->isEmpty()) {
            return "ないです";
        }else {
            return $users;
        }

    }
}
