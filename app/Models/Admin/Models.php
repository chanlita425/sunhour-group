<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\HasMany;
use Laravel\Scout\Searchable;
class Models extends Model
{
    use HasFactory;
    // use Searchable;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',  // Ensure uuid is cast to a string
    ];
    protected $fillable = ['uuid', 'product_id','name', 'link','path','category_id', 'slug'];
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function modelfunction()
    {
        return $this->hasMany(ModelFunction::class);
    }

    public function dailyclean(){
        return $this->hasMany(DailyClean::class);
    }
    public function deepclean(){
        return $this->hasMany(DeepClean::class);
    }

    public function media(){
        return $this->hasMany(Media::class);
    }

    public function filedownload()
    {
        return $this->hasMany(FileDownload::class);
    }

    public function award()
    {
        return $this->hasMany(Award::class);
    }

    public function feature()
    {
        return $this->hasMany(Feature::class);
    }
    public function space()
    {
        return $this->hasMany(Space::class);
    }

     public function toSearchableArray()
    {
        return [
            'product_id' => $this->product_id,
            'name'        => $this->name,
            'category_id'  => $this->category_id
        ];
    }
}
