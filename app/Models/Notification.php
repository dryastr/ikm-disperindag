<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'ikm_registration_id',
        'message',
        'is_read',
    ];

    public function ikmRegistration()
    {
        return $this->belongsTo(IkmRegistration::class, 'ikm_registration_id');
    }

    public function ikm()
    {
        return $this->belongsTo(IkmRegistration::class, 'ikm_registration_id');
    }
}
