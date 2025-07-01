<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyClean extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',
    ];

    protected $fillable = ['uuid','name','video','model_id'];

    public function model(){
        return $this->belongsTo(Models::class,'model_id');
    }
}
