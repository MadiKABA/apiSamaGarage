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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->text("description");
            $table->float("prix");
            $table->string("urlImage");
            $table->dateTime("datePublication");
            $table->boolean("statut")->default(true);
            $table->boolean("cloture")->default(false);
            $table->unsignedBigInteger("typeAnnonce_id");
            $table->unsignedBigInteger("utilisateur_id");
            $table->foreign("typeAnnonce_id")->references("id")->on("type_annonces");
            $table->foreign("utilisateur_id")->references("id")->on("utilisateurs");
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
        Schema::dropIfExists('annonces');
    }
};
