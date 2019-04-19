<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name', 'permission'
    ];

    public function roles()
    {
        return $this->belongsToMany(role::class, 'permission_roles');
    }
}
