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
        Schema::create('actors', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->string('first_name'); // Voornaam van de acteur
            $table->string('last_name'); // Achternaam van de acteur
            $table->integer('age'); // Leeftijd in jaren
            $table->enum('sex', ['male', 'female', 'other']); // Geslacht
            $table->string('country'); // Land van herkomst
            $table->boolean('has_won_awards')->default(false); // Of de acteur prijzen heeft gewonnen
            $table->timestamps(); // Automatische timestamps (aangemaakt/bijgewerkt)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
