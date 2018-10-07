<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class ProblemFile extends Model
{
    protected $table        = 'Score_server';
    protected $connection   = 'score';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','point'
    ];
    protected $hidden = [

    ];
    protected $guarded = [
        'id'
    ];
}
