<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Media extends Model
{
    use HasFactory;
    protected $table = 'medias';
    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',  // Ensure uuid is cast to a string
    ];
    protected $fillable = ['uuid','name', 'link','model_id'];

    public function models(){
        return $this->belongsTo(Models::class,'model_id');
    }

}
