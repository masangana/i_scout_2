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
        Schema::table('groupes', function (Blueprint $table) {
            $table->string('affiliate')->nullable();
            $table->foreignId('province_id')->constrained('provinces');
            $table->date('creation_date');
            $table->string('adresse');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('couleur_1')->nullable();
            $table->string('couleur_2')->nullable();
            $table->string('couleur_3')->nullable();
            $table->string('is_actif')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groupes', function (Blueprint $table) {
            
        });
    }
};
