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
        Schema::create('epochs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('type', 30)->nullable(); // tempo, solenidade, festa, memória
            $table->integer('priority_level')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epochs');
    }
};
