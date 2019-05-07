<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    public function up() :void
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('is_active')->default(0);
            $table->string('flag_country');
            $table->string('code');
            $table->string('iso');
            $table->string('file');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()  :void
    {
        Schema::dropIfExists('languages');
    }
}
