<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{

    public function up() :void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('is_active')->default(0);
            $table->string('title');
            $table->json('content')->nullable();
            $table->timestamps();
        });
    }

    public function down() :void
    {
        Schema::dropIfExists('contents');
    }
}
