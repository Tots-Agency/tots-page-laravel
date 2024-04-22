<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tots_page', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250)->nullable(false);
            $table->string('slug', 250)->nullable(false)->index();
            $table->unsignedBigInteger('language_id');
            $table->json('data')->nullable(true);
            $table->longText('content')->nullable(true);
            $table->tinyInteger('type')->nullable(false)->default(0);
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('tots_language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_page');
    }
};
