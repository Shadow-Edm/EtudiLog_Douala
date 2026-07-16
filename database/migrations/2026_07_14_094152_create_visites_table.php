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
        Schema::create('visites', function (Blueprint $table) {

            $table->id();

            $table->foreignId('etudiant_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('logement_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('admin_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->date('date_visite')
                ->nullable();

            $table->time('heure_visite')
                ->nullable();

            $table->text('message')
                ->nullable();

            $table->text('note_admin')
                ->nullable();

            $table->enum('statut',[
                'en_attente',
                'proposee',
                'confirmee',
                'annulee',
                'terminee'
            ])->default('en_attente');

            $table->timestamp('confirmee_at')
                ->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
