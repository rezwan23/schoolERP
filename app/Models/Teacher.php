<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name', 'email', 'photo', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
