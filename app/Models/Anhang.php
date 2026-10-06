<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Anhang extends Model
{
    protected $table = 'anhaenge';

    public $timestamps = false;

    protected $fillable = [
        'information_id',
        'dateiname',
        'dateipfad',
        'dateityp',
    ];

    public function information(): BelongsTo
    {
        return $this->belongsTo(Information::class);
    }
    
    public function getUrlAttribute(): string
    {
        return Storage::url($this->dateipfad);
    }
}
