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
        'active',
        'graduated',
    ];

    protected $table = 'dual_sheets';

    public function getAverage()
    {
        return (
            $this->jobEvaluation->getAverage() +
            $this->diaryEvaluation->getAverage()
        ) / 2;
    }

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id');
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

    public function diaryEntries()
    {
        return $this->hasMany(DiaryEntry::class, 'sheet_id');
    }

    public function followUps()
    {
        return $this->hasMany(FollowUp::class, 'sheet_id');
    }

    public function jobEvaluation()
    {
        return $this->hasOne(JobEvaluation::class, 'sheet_id');
    }

    public function diaryEvaluation()
    {
        return $this->hasOne(DiaryEvaluation::class, 'sheet_id');
    }
}
