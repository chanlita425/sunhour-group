<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDownload extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string',  // Ensure uuid is cast to a string
    ];
    protected $fillable = ['uuid','name', 'path','model_id','icon'];

    public function models(){
        return $this->belongsTo(Models::class,'model_id','uuid');
    }
}
