<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albumimages', function (Blueprint $table) {
            $table->id();
            $table->string('img_name');
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('id')->on('albums');
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
        Schema::dropIfExists('albumimages');
    }
}
