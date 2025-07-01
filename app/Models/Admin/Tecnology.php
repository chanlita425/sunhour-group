<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    protected $primaryKey = 'uuid';
    protected $table = 'technologies';
    protected $casts = [
        'uuid' => 'string',
    ];
    protected $fillable = ['uuid','name','description','functions_id','link'];

    public function modelfunction(){
        return $this->belongsTo(ModelFunction::class, 'functions_id');
    }
}
