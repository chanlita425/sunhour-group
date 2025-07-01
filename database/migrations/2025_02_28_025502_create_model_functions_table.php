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
        Schema::create('model_functions', function (Blueprint $table) {
            $table->text('uuid')->primary();
            $table->string('name');
            $table->text('icon');
            $table->foreignId('model_id')->constrained('models','uuid')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_functions');
    }
};
