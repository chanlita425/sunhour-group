<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Brand extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',  // Ensure uuid is cast to a string
    ];
    protected $fillable = ['uuid','name','logoSvg', 'slug', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'uuid');
    }
}
