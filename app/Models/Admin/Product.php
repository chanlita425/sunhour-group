<?php

namespace App\Models\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Relations\HasMany;
use Laravel\Scout\Searchable;

class Product extends Model
{
    // use Searchable;
    protected $primaryKey = 'uuid';
    protected $table = 'products';
    protected $casts = [
        'uuid' => 'string',  // Ensure uuid is cast to a string
    ];
    protected $fillable = ['uuid','name','name_khmer','name_chinese','brand_id','link','status', 'slug', 'description'];

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'uuid');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'product_id', 'uuid');
    }

    public function models()
    {
        return $this->hasMany(\App\Models\Admin\Models::class, 'product_id', 'uuid');
    }
}
