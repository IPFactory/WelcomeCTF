<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRememberToken extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('remember_token');
        });
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('remember_token');
        });
    }
}
