<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User      as User;
use App\Model\ActiveLog as ActiveLog;
use App\Model\Problem   as Problem;
use App\Model\Category  as Category;


class hoge extends Controller
{
    private $user;
    /*
    *
    SELECT count(problems.id)
    FROM ActiveLogs
    INNER JOIN problems ON problems.id = ActiveLogs.problem_id
    INNER JOIN category ON category.id = problems.category
    WHERE user_id = 1 AND category.category = 'Web';

    select *
    from `ActiveLogs`
    inner join `problems` on `problems`.`id` = `ActiveLogs`.`problem_id`
    inner join `category` on `category`.`id` = `problems`.`category`
    where
    `user_id` = 1 and `category`.`category` = ? and `category`.`category` = ?
    *
    */
    public function hoge (Request $Request) {
        $id=$Request->id;
        $response = [];
        $ActiveLog = ActiveLog::join('problems','problems.id','=','ActiveLogs.problem_id')->join('category','category.id','=','problems.category')->where('user_id','=',$id);
        $categorys =Category::get(['category']);
        print($ActiveLog->count('problems.id')."\n");
        foreach ($categorys as $key => $value;) {
            $dumy=$ActiveLog;
            print($value->category.':'.$dumy->where('category.category','=',$value->category)->toSql()."\n");
        }
        return ;

    }
}
