<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActLogTable extends Migration
{
    public function up()
    {
        Schema::connection('mysql')->create('ActiveLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('problem_id');
            $table->tinyInteger('is_open')->default($value = 0);
            $table->tinyInteger('is_solve')->default($value = 0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('hint_open_at')->nullable();
        });
    }

    public function down()
    {
        Schema::connection('mysql')->dropIfExists('ActiveLogs');
    }
}
