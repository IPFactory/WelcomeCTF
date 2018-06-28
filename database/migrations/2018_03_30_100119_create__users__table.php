<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('name', 16);
            $table->text('icon')->nullable();
            $table->text('icon_small')->nullable();
            $table->integer('point')->default($value = 0);
            $table->bigInteger("facebook_id");
            $table->bigInteger("github_id");
            $table->timestamp();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
