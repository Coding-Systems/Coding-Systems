<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10);
            $table->mediumInteger('total_pts')->default(0);
            $table->mediumInteger('total_pts_note')->default(0);
            $table->mediumInteger('total_pts_po')->default(0);
            $table->mediumInteger('total_pts_defi')->default(0);
            $table->tinyInteger('logo_lvl')->default(1);
            $table->timestamps();
        });
    }

    /*public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('points_up');
            $table->integer('points_down');
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
        Schema::dropIfExists('systems');
    }
}
