<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;
use Laravel\Scout\Searchable;

class Category extends Model
{
    // use Searchable;
    protected $primaryKey = 'uuid';
    protected $table = 'categories';
    protected $casts = [
        'uuid' => 'string',  // Ensure uuid is cast to a string
    ];
    protected $fillable = ['uuid','name','product_id','link', 'slug', 'description'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function models()
    {
        return $this->hasMany(Model::class);
    }

    public $timestamps = false;
}
