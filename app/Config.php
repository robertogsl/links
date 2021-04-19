<?php

namespace App;

use App\Aplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Config extends Model
{
    protected $fillable = [
        'payload',
        'userLastAlteration',
        'aplication_id'
    ];

    public function aplications():BelongsTo {
        return $this->belongsTo(Aplication::class);
    }
}
