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
        Schema::create('reason_absences', function (Blueprint $table) {
            $table->id();
                 $table->foreignId('presence_id')->constrained('presences')->onDelete('cascade');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        $table->text('motif');
        $table->string('piece_jointe')->nullable();
        $table->enum('statut_justification', ['en_attente', 'accepte', 'refuse'])->default('en_attente');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reason_absences');
    }
};
