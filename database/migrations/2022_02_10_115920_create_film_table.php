<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmek', function (Blueprint $table) {
            $table->id("id");
            $table->string("cim");
            $table->string("leiras");
            $table->year("megjelenesiEv");
            $table->integer("ertekeles");
            $table->string("imageUrl");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmek');
    }
}
