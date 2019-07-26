<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('printings', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->text('link');
            $table->boolean('size_id');
            $table->smallInteger('height');
            $table->boolean('hollow')->default(1);
            $table->boolean('support')->default(0);
            $table->boolean('post_processing')->default(0);
            $table->boolean('material')->default(1);
            $table->boolean('quality');
            $table->integer('quantity');
            $table->char('country', 2);
            $table->string('zip_code');
            $table->string('state')->nullable();
            $table->string('state_abbreviation')->nullable();
            $table->string('city');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('address');
            $table->bigInteger('phone');
            $table->string('verify_token')->nullable()->unique();
            $table->unsignedInteger('status_id')->default(1);
            $table->unsignedInteger('language_id')->nullable();
            $table->unsignedBigInteger('executor_id')->nullable();
            $table->timestamps();
        });
        Schema::table('printings', static function (Blueprint $table) {
            $table->foreign('status_id')->references('id')
                ->on('statuses');
            $table->foreign('language_id')->references('id')
                ->on('languages');
            $table->foreign('executor_id')->references('id')
                ->on('users');
        });
    }

    public function down(): void
    {
        Schema::table('printings', static function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['language_id']);
            $table->dropForeign(['executor_id']);
        });
        Schema::dropIfExists('printings');
    }
}
