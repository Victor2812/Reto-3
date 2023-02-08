<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'diary_entry_id',
        'name',
        'reflection',
        'difficulties'
    ];

    public function diaryEntry()
    {
        return $this->belongsTo(DiaryEntries::class, 'diary_entry_id');
    }
}
