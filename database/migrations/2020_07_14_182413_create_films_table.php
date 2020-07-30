<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('film_name');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('release_year_id');
            $table->unsignedBigInteger('country_id');
            $table->time('time');
            $table->text('description');
            $table->integer('price');
            $table->integer('have_bought')->default(0)->index();
            $table->string('img_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
