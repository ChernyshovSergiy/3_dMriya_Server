<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    public function up() :void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang', 5);
            $table->string('lang_name', 50);
            $table->char('country_alpha2_code', 2);
            $table->char('country_alpha3_code', 3);
            $table->char('country_numeric_code', 3);
            $table->string('country_name', 200);
        });
    }

    public function down() :void
    {
        Schema::dropIfExists('countries');
    }
}
