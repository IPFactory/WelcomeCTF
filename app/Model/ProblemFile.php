<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class ProblemFile extends Model
{
    protected $table = 'Problem_files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','first_data','second_data'
    ];
    protected $hidden = [

    ];
    protected $guarded = [
        'id'
    ];
}
