<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmszineszeiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmszineszei', function (Blueprint $table) {
            $table->bigInteger("filmId")->unsigned();
            $table->bigInteger("szineszId")->unsigned();
            $table->foreign("filmId")->references("id")->on("filmek")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("szineszId")->references("id")->on("szineszek")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmszineszei');
    }
}
