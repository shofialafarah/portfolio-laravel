<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comment_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->constrained()->onDelete('cascade');
            $table->string('reaction', 20); // 'like', 'love', dll
            $table->string('ip_address', 45);
            $table->timestamps();
            
            // Pastikan 1 IP hanya bisa 1x react per comment
            $table->unique(['comment_id', 'ip_address', 'reaction']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comment_reactions');
    }
};