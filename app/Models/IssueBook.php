<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    protected $fillable = [
        'student_id', 'book_id', 'is_returned'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function markAsReturned()
    {
        $this->is_returned = 1;
        $this->update();
    }
}
