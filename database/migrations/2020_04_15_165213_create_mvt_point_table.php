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
        Schema::create('mvt_point', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('house_id');
            $table->foreignId('users_id');
            $table->foreignId('professor_id');
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
