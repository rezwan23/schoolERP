<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMeta extends Model
{
    protected $fillable = [
        'title', 'logo', 'address', 'email', 'phone'
    ];
}
