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
        Schema::create('mass_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mass_id')->constrained()->cascadeOnDelete();
            $table->foreignId('moment_id')->constrained()->cascadeOnDelete();

            /* Quando for uma música cadastrada no repertório */
            $table->foreignId('song_id')->nullable()->constrained()->nullOnDelete();

            /* * Para Salmos, Aleluias, Sequências, observações ou qualquer item personalizado. */
            $table->string('title')->nullable();

            /* * Salmo do dia, versículo do Aleluia, observações, etc. */
            $table->longText('content')->nullable();

            /* * Tom específico daquela celebração. */
            $table->string('tone')->nullable();

            /* * Ordem dentro da celebração. */
            $table->unsignedSmallInteger('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mass_items');
    }
};
