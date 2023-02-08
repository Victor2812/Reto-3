<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id', 'text', 'diary_entry_id'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function diaryEntry()
    {
        return $this->belongsTo(DiaryEntries::class, 'diary_entry_id');
    }
}
