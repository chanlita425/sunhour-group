<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fa_qs', function (Blueprint $table) {
            if (!Schema::hasColumn('fa_qs', 'brand_id')) {
                $table->string('brand_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('fa_qs', 'category_id')) {
                $table->string('category_id')->nullable()->after('brand_id');
            }
            if (!Schema::hasColumn('fa_qs', 'product_id')) {
                $table->string('product_id')->nullable()->after('category_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fa_qs', function (Blueprint $table) {
            $table->dropColumn(['brand_id', 'category_id', 'product_id']);
        });
    }
};
