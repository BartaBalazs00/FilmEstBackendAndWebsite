<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentettfilmekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentettfilmek', function (Blueprint $table) {
            $table->bigInteger("userId")->unsigned();
            $table->bigInteger("filmId")->unsigned();
            $table->foreign("userId")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("filmId")->references("id")->on("filmek")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentettfilmek');
    }
}
