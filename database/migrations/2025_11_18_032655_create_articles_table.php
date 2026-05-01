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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();

            // English
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('content')->nullable();
            $table->longText('description')->nullable();

            // Khmer
            $table->string('title_kh')->nullable();
            $table->string('subtitle_kh')->nullable();
            $table->string('content_kh')->nullable();
            $table->longText('description_kh')->nullable();

            // Chinese
            $table->string('title_cn')->nullable();
            $table->string('subtitle_cn')->nullable();
            $table->string('content_cn')->nullable();
            $table->longText('description_cn')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
