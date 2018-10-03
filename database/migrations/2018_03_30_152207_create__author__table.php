<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorTable extends Migration
{
    public function up()
    {
        Schema::connection('mysql')->create('Author', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link');
        });
    }

    public function down()
    {
        Schema::connection('mysql')->dropIfExists('Author');
    }
}
