<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('score')->create('Problem_flags', function (Blueprint $table) {
            $table->integer('id');
            $table->longText('correct_flag');
            $table->integer('solve_count')->default($value = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('score')->dropIfExists('problem_flags');
    }
}
