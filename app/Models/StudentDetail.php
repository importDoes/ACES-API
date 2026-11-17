<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentDetail extends Model
{
    protected $fillable = [
        'user_id',
        'role_id',
        'name',
        'email',
        'age',
        'gender',
        'addresses',
        'birthdate',
        'contact_number',
        'parent_guardian_name',
        'guardian_contact_number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'user_id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'addresses');
    }
    //
}
