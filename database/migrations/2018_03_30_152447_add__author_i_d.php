<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorID extends Migration
{
    public function up()
    {
        Schema::table('problems', function (Blueprint $table) {
           $table->string('author_id');
        });
    }

    public function down()
    {
        Schema::table('problems', function($table) {
            $table->dropColumn('author_id');
        });
    }
}
