<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DualSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tutor_id',
        'company_id',
        'course_id',
        'school_year_id',
    ];

    protected $table = 'dual_sheets';

    public function student()
    {
        return $this->belongsTo(Person::class, 'sutdent_id');
    }

    public function academicTutor()
    {
        return $this->belongsTo(Person::class, 'tutor_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }

    public function scopeFromTutor(Builder $query, Person $tutor)
    {
        $query->where('tutor_id', '=', $tutor->id);
    }
}
