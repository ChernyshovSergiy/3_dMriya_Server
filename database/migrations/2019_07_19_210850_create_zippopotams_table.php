<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZippopotamsTable extends Migration
{

    public function up() :void
    {
        Schema::create('zippopotams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country', 200);
            $table->char('country_alpha2_code', 2);
            $table->string('example_url', 200);
            $table->string('range', 100);
            $table->string('mask', 50)->nullable();
            $table->integer('count');
            $table->integer('characters');
        });
    }

    public function down() :void
    {
        Schema::dropIfExists('zippopotams');
    }
}
