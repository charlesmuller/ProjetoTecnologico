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
        Schema::create('data_hqs', function (Blueprint $table) {
            $table->id('id_hq');
            $table->string('title_hq')->nullable();
            $table->string('caracter_hq')->nullable();
            $table->integer('edition_number_hq')->nullable();
            $table->date('release_year_hq')->nullable();
            $table->string('obs_hq')->nullable();
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
        Schema::dropIfExists('data_hqs');
    }
};
