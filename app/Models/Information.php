<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'titel',
        'nachricht',
        'status',
        'ist_wichtig',
        'veroeffentlicht_am',
        'autor_id',
    ];
}
