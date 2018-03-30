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
            $table->string('login_id', 16);
            $table->string('name', 16);
            $table->string('password', 64);
            $table->text('icon')->nullable($value = true);
            $table->text('icon_small')->nullable($value = true);
            $table->integer('point')->default($value = 0);
            $table->timestamp('make_at');
            $table->timestamp('update_at')->nullable($value = true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
