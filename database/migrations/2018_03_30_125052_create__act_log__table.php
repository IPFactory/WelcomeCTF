<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActLogTable extends Migration
{
    public function up()
    {
        Schema::create('act_log', function (Blueprint $table) {
            $table->increments('act_id');
            $table->integer('user_id');
            $table->integer('problem_id');
            $table->tinyInteger('is_open')->default($value = 0);
            $table->tinyInteger('is_solve')->default($value = 0);
            $table->timestamp('open_at')->nullable();
            $table->timestamp('solve_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('act_log');
    }
}
