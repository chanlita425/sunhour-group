<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ModelFunction extends Model
{
    protected $primaryKey = 'uuid';
    protected $table = 'model_functions';
    protected $casts = [
        'uuid' => 'string',
    ];
    protected $fillable = ['uuid','name','model_id','icon'];

    public function models(){
        return $this->belongsTo(Models::class, 'model_id');
    }

    public function technologies()
    {
        return $this->hasMany(Tecnology::class);
    }
}
