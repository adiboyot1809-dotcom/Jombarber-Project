<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model {
    protected $primaryKey = 'review_id';
    protected $fillable = ['user_id', 'barber_id', 'rating', 'comment'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barber(): BelongsTo {
        return $this->belongsTo(Barber::class, 'barber_id');
    }
}