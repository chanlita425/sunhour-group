<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',
    ];
    protected $fillable = ['uuid','type','description','model_id'];

    public function models(){
        return $this->belongsTo(Models::class,'model_id');
    }
}
