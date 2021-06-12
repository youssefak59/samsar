<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
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
            $table->string("adresse");
            $table->string("region");
            $table->string("ville");
            $table->string("quartier");
            $table->string("Transaction");
            $table->string("Type_bien");
            $table->string("Etat");
            $table->integer("surface");
            $table->integer("prix");
            $table->integer("etage");
            $table->integer("pieces");
            $table->integer("chambres");
            $table->integer("salles");
            $table->string("Caracteristiques");
            $table->string("Interieur");
            $table->string("Options");
            $table->string("titre");
            $table->string("tele");
            $table->string("description");
            $table->string("typeannonce");
            $table->string("switchpremium");
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
}
