<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentgroups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('1');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('studentgroups');
    }
}
