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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title_comic')->nullable();
            $table->string('character_comic')->nullable();
            $table->integer('edition_number_comic')->nullable();
            $table->date('release_year_comic')->nullable();
            $table->string('obs_comic')->nullable();
            $table->string('images');
            $table->foreignId('collection_id')->nullable(true);
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
};
