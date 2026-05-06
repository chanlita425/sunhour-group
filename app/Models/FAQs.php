<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;

class FAQs extends Model
{
    protected $table = 'fa_qs';

    protected $fillable = [
        'brand_id',
        'category_id',
        'product_id',
        'q_english', 'a_english',
        'q_khmer', 'a_khmer',
        'q_china', 'a_china',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'uuid');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'uuid');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'uuid');
    }

    /**
     * Derive display level:
     * - product_id set  → 'model'   (shows on model/product page)
     * - brand_id only   → 'brand'   (shows on brand page)
     */
    public function getDisplayLevelAttribute(): string
    {
        if ($this->product_id) {
            return 'model';
        }
        return 'brand';
    }
}
