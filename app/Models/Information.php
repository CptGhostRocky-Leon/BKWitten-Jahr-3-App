<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function anhaenge(): HasMany
    {
        return $this->hasMany(Anhang::class);
    }
}
