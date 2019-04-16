<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['user_id', 'class_id', 'roll','name', 'gender', 'dob', 'nationality', 'nid_number', 'permanent_address', 'present_address', 'photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getClass()
    {
        return $this->belongsTo(CollegeClass::class, 'class_id');
    }
}
