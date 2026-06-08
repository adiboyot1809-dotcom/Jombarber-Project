<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model {
    protected $primaryKey = 'appointment_id';
    protected $fillable = ['user_id', 'barber_id', 'appointment_date', 'appointment_time', 'status', 'queue_number', 'notes', 'price'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barber(): BelongsTo {
        return $this->belongsTo(Barber::class, 'barber_id');
    }
}