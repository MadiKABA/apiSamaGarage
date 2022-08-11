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
        Schema::create('service_garages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("garage_id");
            $table->unsignedBigInteger("service_id");
            $table->foreign("garage_id")->references("id")->on("garages");
            $table->foreign("service_id")->references("id")->on("services");
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
        Schema::dropIfExists('service_garages');
    }
};
