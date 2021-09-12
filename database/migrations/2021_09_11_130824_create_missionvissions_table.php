<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionvissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missionvissions', function (Blueprint $table) {
            $table->id();
            $table->text('mission')->nullable();
            $table->text('vission')->nullable();
            $table->string('image')->nullable();
            $table->string('chair_image')->nullable();
            $table->longText('chair_message')->nullable();
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
        Schema::dropIfExists('missionvissions');
    }
}
