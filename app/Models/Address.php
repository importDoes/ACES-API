<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $fillable = [
        'address_number',
        'street',
        'barangay',
        'district',
        'municipality',
        'city',
        'province',
        'zip_code',
    ];

    public function studentDetails(): HasMany
    {
        return $this->hasMany(StudentDetail::class, 'addresses');
    }
}
