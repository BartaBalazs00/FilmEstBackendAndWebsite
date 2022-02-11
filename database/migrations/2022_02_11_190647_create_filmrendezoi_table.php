<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmrendezoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmrendezoi', function (Blueprint $table) {
            $table->bigInteger("filmId")->unsigned();
            $table->bigInteger("rendezoId")->unsigned();
            $table->foreign("filmId")->references("id")->on("filmek")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("rendezoId")->references("id")->on("rendezok")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmrendezoi');
    }
}
