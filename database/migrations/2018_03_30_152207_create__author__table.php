<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorTable extends Migration
{
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->increments('author_id');
            $table->string('name');
            $table->string('link');
        });
    }

    public function down()
    {
        Schema::dropIfExists('author');
    }
}
