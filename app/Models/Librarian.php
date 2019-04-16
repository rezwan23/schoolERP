<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    protected $fillable = ['name', 'photo', 'email', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
