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
        Schema::create('file_downloads', function (Blueprint $table) {
            $table->text('uuid')->primary();
            $table->string('name');
            $table->string('path');
            $table->foreignId('model_id')->constrained('models','uuid')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_downloads');
    }
};
