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
        Schema::create('fa_qs', function (Blueprint $table) {
            $table->id();
            $table->string('q_english');
            $table->text('a_english');
            $table->string('q_khmer')->nullable();
            $table->text('a_khmer')->nullable();
            $table->string('q_china')->nullable();
            $table->text('a_china')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fa_qs');
    }
};
