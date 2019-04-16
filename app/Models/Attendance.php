<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['class_id', 'date', 'student_id', 'present'];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
