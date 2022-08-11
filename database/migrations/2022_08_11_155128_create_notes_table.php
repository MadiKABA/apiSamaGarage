<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string("commentaire");
            $table->string("email");
            $table->string("telephone");
            $table->string("nomClient");
            $table->integer("note");
            $table->dateTime("dateNote");
            $table->unsignedBigInteger("garage_id");
            $table->foreign("garage_id")->references("id")->on("garages");
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
        Schema::dropIfExists('notes');
    }
};
