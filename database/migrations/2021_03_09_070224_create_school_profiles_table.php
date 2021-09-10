<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('school_phone')->nullable();
            $table->string('coordinator')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('images')->nullable();
            $table->text('school_address')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('school_profiles');
    }
}
