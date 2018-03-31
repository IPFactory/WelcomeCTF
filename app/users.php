<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public function index()
    {

    }
}
