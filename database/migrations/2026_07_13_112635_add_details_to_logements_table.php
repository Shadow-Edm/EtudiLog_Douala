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
        Schema::table('logements', function (Blueprint $table) {

            $table->string('etablissement_proche')
                ->after('adresse');

            $table->decimal('distance_ecole', 4, 2)
                ->nullable()
                ->after('etablissement_proche');

            $table->integer('nombre_douches')
                  ->default(1)
                  ->after('nombre_chambres');

            $table->integer('superficie')
                  ->nullable()
                  ->after('nombre_douches');

            $table->boolean('wifi')
                  ->default(false)
                  ->after('superficie');

            $table->boolean('forage')
                  ->default(false)
                  ->after('wifi');

            $table->boolean('gardien')
                  ->default(false)
                  ->after('forage');

            $table->boolean('est_verifie')
                  ->default(false)
                  ->after('gardien');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logements', function (Blueprint $table) {
            $table->dropColumn([
                'etablissement_proche',
                'distance_ecole',
                'nombre_douches',
                'superficie',
                'wifi',
                'forage',
                'gardien',
                'est_verifie',
            ]);
        });
    }
};
