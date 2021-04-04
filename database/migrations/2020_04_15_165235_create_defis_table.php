<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('defis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenger_id');
            $table->foreignId('target_id');
            $table->foreignId('arbiter_id');
            $table->foreignId('winner_id')->nullable(true);
            $table->foreignId('type_id');
            $table->boolean('is_accepted')->nullable(true);
            $table->timestamps();

            $table->foreign('challenger_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('target_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('arbiter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('winner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('defis_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defis');
    }
}
