<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class ProblemFile extends Model
{
    protected $table        = 'Problem_flags';
    protected $connection   = 'score';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','correct_flag'
    ];
    protected $hidden = [

    ];
    protected $guarded = [
        'id'
    ];
}
