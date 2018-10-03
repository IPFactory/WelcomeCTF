<?php

namespace App\Model;

use App\Model\User;
use App\Model\Problem;
use Illuminate\Database\Eloquent\Model;

class ActiveLog extends Model
{
    //act_log
    protected $table        = 'ActiveLogs';
    protected $connection   = 'score';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id','problem_id','is_open','is_solve'
    ];

}
