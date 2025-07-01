<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeepClean extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',
    ];

    protected $fillable = ['uuid','name','video','model_id'];

    public function models(){
        return $this->belongsTo(Models::class,'model_id');
    }
}
