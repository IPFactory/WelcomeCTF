<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Problem extends Model
{
    protected $table        = 'Problems';
    protected $connection   = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title','category','statement','point','hint','author_id','link'
    ];
    protected $hidden = [

    ];
    protected $guarded = [
        'id'
    ];
}
