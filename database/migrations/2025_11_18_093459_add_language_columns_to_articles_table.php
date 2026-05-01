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
        Schema::table('articles', function (Blueprint $table) {
            // Khmer
            $table->string('title_kh')->nullable()->after('title');
            $table->string('subtitle_kh')->nullable()->after('subtitle');
            $table->string('content_kh')->nullable()->after('content');
            $table->longText('description_kh')->nullable()->after('description');

            // Chinese
            $table->string('title_cn')->nullable()->after('title_kh');
            $table->string('subtitle_cn')->nullable()->after('subtitle_kh');
            $table->string('content_cn')->nullable()->after('content_kh');
            $table->longText('description_cn')->nullable()->after('description_kh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn([
                'title_kh', 'subtitle_kh', 'content_kh', 'description_kh',
                'title_cn', 'subtitle_cn', 'content_cn', 'description_cn',
            ]);
        });
    }
};
