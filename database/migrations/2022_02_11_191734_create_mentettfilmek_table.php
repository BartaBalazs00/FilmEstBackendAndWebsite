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
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("film_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("film_id")->references("id")->on("filmek")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
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
