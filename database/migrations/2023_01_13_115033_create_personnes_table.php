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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('post_nom');
            $table->string('prenom');
            $table->string('totem')->nullable();
            $table->string('sexe');
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('nationalite');
            $table->string('profession');
            $table->string('adresse');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('photo');
            $table->string('etat_civil');
            $table->foreignId('groupe_id')->constrained('groupes');
            $table->foreignId('district_id')->constrained('districts');
            $table->foreignId('province_id')->constrained('provinces');
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
        Schema::dropIfExists('personnes');
    }
};
