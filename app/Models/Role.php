<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
    ];

    public function studentDetails(): HasMany
    {
        return $this->hasMany(StudentDetail::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class)
        ->using(PermissionRole::class)
        ->withTimestamps();
    }
    //
}
