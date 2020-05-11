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
            $table->text('label');
            $table->foreignId('house_id');
            $table->foreignId('users_id');
            $table->foreignId('professor_id');
            $table->foreignId('type_point_id');
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
        Schema::dropIfExists('mvt_point');
    }
}
