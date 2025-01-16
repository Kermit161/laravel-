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
        Schema::create('media_actor', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->foreignId('actor_id')->constrained()->onDelete('cascade'); // Verwijzing naar actors
            $table->foreignId('media_id')->constrained()->onDelete('cascade'); // Verwijzing naar media
            $table->timestamps(); // Automatische timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_actor');
    }
};
