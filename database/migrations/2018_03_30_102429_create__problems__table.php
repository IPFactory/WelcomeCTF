<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('problem_id');
            $table->string('name', 16);
            $table->string('category', 16);
            $table->longText('statement');
            $table->tinyInteger('point');
            $table->longText('hint');
            $table->longText('correct_flag');
            $table->integer('solve_count')->default($value = 0);
            $table->mediumText('first_data')->nullable();
            $table->mediumText('second_data')->nullable();
            $table->timestamp('make_at');
            $table->timestamp('update_at')->nullable();
            $table->timestamp('reserve_at')->nullable();
            $table->timestamp('hint_open_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('problems');
    }
}
