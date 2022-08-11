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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string("nomClient");
            $table->string("telephone");
            $table->string("email");
            $table->text("contenu");
            $table->dateTime("dateCommentaire");
            $table->unsignedBigInteger("annonce_id");
            $table->foreign("annonce_id")->references("id")->on("annonces");
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
        Schema::dropIfExists('commentaires');
    }
};
