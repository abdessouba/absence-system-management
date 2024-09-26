<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seance_id');
            $table->foreign('seance_id')->references('id')->on('seance');
            $table->unsignedBigInteger('stagiaire_id');
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires');
            $table->unsignedBigInteger('etat_absence_id');
            $table->foreign('etat_absence_id')->references('id')->on('etat_absences');
            $table->string('observation');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
