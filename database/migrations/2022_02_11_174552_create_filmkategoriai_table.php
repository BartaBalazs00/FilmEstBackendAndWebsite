<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmkategoriaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmkategoriai', function (Blueprint $table) {
            $table->bigInteger("filmId")->unsigned();
            $table->bigInteger("kategoriaId")->unsigned();
            $table->foreign("filmId")->references("id")->on("filmek")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("kategoriaId")->references("id")->on("kategoriak")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('filmkategoriai');
        //Schema::enableForeignKeyConstraints();
    }
}
