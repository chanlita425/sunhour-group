<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',  // Ensure uuid is cast to a string
    ];
    protected $fillable = ['uuid', 'path','model_id'];

    public function models(){
        return $this->belongsTo(Models::class,'model_id','uuid');
    }
}
