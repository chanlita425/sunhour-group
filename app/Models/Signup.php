<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $table = 'signups';
    protected $fillable = [
        'full_name', 'company', 'position',
        'phone', 'email', 'specialty',
        'heard_from', 'consent'
    ];
}
