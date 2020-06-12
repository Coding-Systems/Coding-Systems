<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable($value = true);;
            $table->string('last_name')->nullable($value = true);;
            $table->string('name');
            $table->string('mail')->unique();
            $table->string('statut', 15)->default('student');;
            $table->foreignId('house_id')->nullable($value = true);
            $table->string('password');
            $table->mediumInteger('total_pts')->default(0);
            $table->mediumInteger('total_pts_note')->default(0);
            $table->mediumInteger('total_pts_po')->default(0);
            $table->mediumInteger('total_pts_defi')->default(0);
            $table->mediumInteger('total_given_pts')->default(0);
            $table->smallInteger('total_won_defis')->default(0);
            $table->tinyInteger('logo_lvl')->default(1);
            $table->smallInteger('year')->default(1);
            $table->timestamps();

            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
