<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
     protected $fillable = [
        'email_lrn',
        'password_hash',
    ];

    public function studentDetails(): HasOne
    {
        return $this->hasOne(StudentDetail::class, 'user_id');
    }
    //
}
