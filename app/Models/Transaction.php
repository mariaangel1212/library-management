<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['student_id', 'book_id', 'borrow_date', 'return_date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function book()
    {
        return $this->belongsTo(Books::class);
    }
}
