<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('reward')->default("Participant");
            $table->string('status')->default(1);
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('studentgroup_id');
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
        Schema::dropIfExists('students');
    }
}
