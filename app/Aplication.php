<?php

namespace App;

use App\User;
use App\Config;
use App\Historic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aplication extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function configs():HasOne {
        return $this->hasOne(Config::class);
    }

    public function historics():HasOne {
        return $this->hasOne(Historic::class);
    }
}
