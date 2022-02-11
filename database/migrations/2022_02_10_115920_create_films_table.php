<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmek', function (Blueprint $table) {
            $table->id("FilmID");
            $table->string("Cim");
            $table->string("leiras");
            $table->year("MegjelenesiEv");
            $table->integer("Ertekeles");
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
        
    }
}
