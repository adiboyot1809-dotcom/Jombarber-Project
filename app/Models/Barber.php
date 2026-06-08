<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barber extends Model {
    protected $primaryKey = 'barber_id';
    protected $fillable = ['name', 'specialization', 'availability_status', 'image_path'];

    public function appointments(): HasMany {
        return $this->hasMany(Appointment::class, 'barber_id');
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class, 'barber_id');
    }
}