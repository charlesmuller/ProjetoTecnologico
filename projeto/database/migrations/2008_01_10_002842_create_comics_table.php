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
            $table->foreignId('collections_id')->nullable(true);
            $table->string('title_comic')->nullable();
            $table->string('character_comic')->nullable();
            $table->integer('edition_number_comic')->nullable();
            $table->date('release_year_comic')->nullable();
            $table->string('obs_comic')->nullable();
            $table->string('images');
            $table->timestamps();
            $table->foreign('collections_id')->references('id')->on('collections')->onDelete('cascade');
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
