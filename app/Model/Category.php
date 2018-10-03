<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table        = 'Category';
    protected $connection   = 'mysql';

    protected $fillable = [
        'id','category'
    ];
}
