<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Brand;
use App\Models\Admin\Product;

class FAQs extends Model
{
    protected $table = 'fa_qs';

    protected $fillable = [
        'faq_type',
        'brand_id',
        'product_id',
        'category_id',
        'q_english', 'a_english',
        'q_khmer', 'a_khmer',
        'q_china', 'a_china',
        'link_text', 'link_url',
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
     * Display level is driven by the stored faq_type:
     * - 'brand'    → shows on brand page
     * - 'category' → shows on product's category listing page
     * - 'model'    → shows on model listing page
     */
    public function getDisplayLevelAttribute(): string
    {
        return $this->faq_type ?? 'brand';
    }
}
