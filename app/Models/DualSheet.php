<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DualSheet extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Person::class, 'sutdent_id');
    }

    public function academicTutor()
    {
        return $this->belongsTo(Person::class, 'tutor_id');
    }
}
