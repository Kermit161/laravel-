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
        Schema::create('media', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->string('title'); // Titel van de media
            $table->enum('type', ['movie', 'series']); // Type (film of serie)
            $table->decimal('rating', 3, 1); // Beoordeling (bijv. 8.5)
            $table->integer('length_in_minutes'); // Lengte in minuten
            $table->date('released_at'); // Releasedatum
            $table->string('country_of_origin'); // Land van oorsprong
            $table->string('youtube_trailer_id')->nullable(); // Optionele YouTube-trailer-ID
            $table->text('summary'); // Samenvatting
            $table->string('spoken_in_language'); // Gesproken taal
            $table->timestamps(); // Timestamps (aangemaakt/bijgewerkt)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
