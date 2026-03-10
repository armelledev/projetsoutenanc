<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_create_presences_table.php
public function up()
{
    Schema::create('presences', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->date('date');
        $table->time('heure_arrivee')->nullable();
        $table->time('heure_depart')->nullable();
        $table->enum('statut', ['present', 'absent', 'retard', 'justifie'])->default('present');
        $table->text('commentaire')->nullable();
        $table->timestamps();
        
        // Un employé ne peut avoir qu'une seule présence par jour
        $table->unique(['user_id', 'date']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
