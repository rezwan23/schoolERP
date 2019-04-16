<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'month', 'student_id', 'paid'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
