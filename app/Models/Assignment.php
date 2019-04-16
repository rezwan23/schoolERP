<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['class_id', 'title', 'content', 'submit_date'];

    public function collegeClass()
    {
        return $this->belongsTo(CollegeClass::class, 'class_id');
    }
}
