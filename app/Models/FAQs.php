<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{
    protected $table = 'fa_qs';

    protected $fillable = [
        'q_english', 'a_english',
        'q_khmer', 'a_khmer',
        'q_china', 'a_china'
    ];
}
