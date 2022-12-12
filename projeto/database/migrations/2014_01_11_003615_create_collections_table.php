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
        Schema::create('collections', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name_collection', 128)->nullable();
            $table->foreignId('id_user_fk')->nullable(true);
            $table->foreign('id_user_fk')->references('id')->on('users');
            $table->foreignId('id_comic_fk')->nullable(true);
            $table->foreign('id_comic_fk')->references('id')->on('comics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
};
