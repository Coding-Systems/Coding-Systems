<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('result_test', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->smallInteger('score_gitsune');
            $table->smallInteger('score_phoenixml');
            $table->smallInteger('score_crackend');
            $table->boolean('quizz_is_done')->default(false);
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result_test');
    }
}
