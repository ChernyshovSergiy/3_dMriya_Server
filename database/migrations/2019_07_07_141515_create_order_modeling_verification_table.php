<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderModelingVerificationTable extends Migration
{
    public function up() :void
    {
        Schema::create('modelings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->text('link');
            $table->boolean('texturing')->default(0);
            $table->string('verify_token')->nullable()->unique();
            $table->unsignedInteger('status_id')->default(1);
            $table->unsignedInteger('language_id')->nullable();
            $table->unsignedBigInteger('executor_id')->nullable();
            $table->timestamps();
        });

        Schema::table('modelings', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')
                ->on('statuses');
            $table->foreign('language_id')->references('id')
                ->on('languages');
            $table->foreign('executor_id')->references('id')
                ->on('users');
        });
    }

    public function down() :void
    {
        Schema::table('modelings', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['language_id']);
            $table->dropForeign(['executor_id']);
        });
        Schema::dropIfExists('modelings');
    }
}
