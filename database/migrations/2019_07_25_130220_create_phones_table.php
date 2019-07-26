<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');
            $table->char('country_alpha2_code', 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
}
