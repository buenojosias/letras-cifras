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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('author', 150)->nullable();
            $table->tinyText('chunk')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('file_path')->nullable();
            $table->boolean('accepted')->default(false);

            // IA
            $table->text('theological_summary')->nullable();
            $table->boolean('summary_approved')->default(false);
            $table->timestamp('summary_generated_at')->nullable();
            $table->string('summary_model', 30)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
