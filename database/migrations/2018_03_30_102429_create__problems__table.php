<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category');
            $table->longText('statement');
            $table->integer('point');
            $table->longText('hint');
            $table->integer('author_id');
            $table->longText('link');
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
