<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fa_qs', function (Blueprint $table) {
            $table->string('link_text')->nullable()->after('a_china');
            $table->string('link_url')->nullable()->after('link_text');
        });
    }

    public function down(): void
    {
        Schema::table('fa_qs', function (Blueprint $table) {
            $table->dropColumn(['link_text', 'link_url']);
        });
    }
};
