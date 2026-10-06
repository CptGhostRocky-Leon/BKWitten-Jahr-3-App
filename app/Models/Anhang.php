<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
