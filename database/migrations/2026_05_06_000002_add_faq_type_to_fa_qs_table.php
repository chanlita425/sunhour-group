<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fa_qs', function (Blueprint $table) {
            if (!Schema::hasColumn('fa_qs', 'faq_type')) {
                $table->string('faq_type')->default('brand')->after('id');
            }
        });

        // Migrate existing rows based on old derived logic
        DB::table('fa_qs')->whereNotNull('product_id')->update(['faq_type' => 'model']);
        DB::table('fa_qs')->whereNotNull('category_id')->whereNull('product_id')->update(['faq_type' => 'model']);
    }

    public function down(): void
    {
        Schema::table('fa_qs', function (Blueprint $table) {
            $table->dropColumn('faq_type');
        });
    }
};
