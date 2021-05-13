<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historic extends Model
{
    protected $fillable = [
        'payload',
        'user_id',
        'aplication_id'
    ];

    public function aplication():BelongsTo {
        return $this->belongsTo(Aplication::class);
    }

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
