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
        Schema::create('mass_embeddings', function (Blueprint $table) {
            $table->id();
            $table->string('model', 50);
            $table->vector('embedding', 1536);
            $table->timestamps();
        });

        DB::statement('CREATE INDEX mass_embedding_index ON mass_embeddings USING ivfflat (embedding vector_cosine_ops)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS mass_embedding_index');
        Schema::dropIfExists('mass_embeddings');
    }
};
