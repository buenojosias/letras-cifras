<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('song_embeddings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('song_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('model', 50);
            $table->vector('embedding', 1536); // ajustar conforme modelo usado
            $table->timestamps();
        });

        DB::statement('CREATE INDEX song_embedding_index ON song_embeddings USING ivfflat (embedding vector_cosine_ops)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS song_embedding_index');
        Schema::dropIfExists('song_embeddings');
    }
};
