<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 16);
            $table->text("email");
            $table->text('password');
            $table->tinyInteger('role')->default(10)->index('index_role');
            $table->text('icon')->nullable();
            $table->text('icon_small')->nullable();
            $table->integer('point')->default($value = 0);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('reserved_at')->nullable();
            $table->timestamp('hint_open_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
