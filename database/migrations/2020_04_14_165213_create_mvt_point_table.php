<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMvtPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('mvt_points', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('nbr_points');
            $table->text('label')->nullable();
            $table->foreignId('users_id');
            $table->foreignId('professor_id')->nullable();
            $table->foreignId('type_point_id');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('professor_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('type_point_id')->references('id')->on('type_points')->onDelete('cascade');;
        });
    }

    /*public function up()
    {
        Schema::create('mvt_points', function (Blueprint $table) {
            $table->id();
            $table->text('label');
            $table->foreignId('house_id');
            $table->foreignId('users_id');
            $table->foreignId('professor_id');
            $table->foreignId('type_point_id');
            $table->timestamps();
        });
    }
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mvt_point');
    }
}
