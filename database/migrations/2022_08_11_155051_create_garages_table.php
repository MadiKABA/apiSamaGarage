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
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->text("description")->default('');
            $table->float("longitude");
            $table->float("latitude");
            $table->string("heureOurverture");
            $table->string("heureFermeture");
            $table->boolean("etat")->default(true);
            $table->boolean("disponibilite")->default(true);
            $table->string("adresse");
            $table->String("image");
            $table->unsignedBigInteger("zone_id");
            $table->unsignedBigInteger("Utilisateur_id");
            $table->foreign("zone_id")->references('id')->on("zones");
            $table->foreign("Utilisateur_id")->references('id')->on("utilisateurs");
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
        Schema::dropIfExists('garages');
    }
};
