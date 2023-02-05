<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryActivities extends Model
{
    use HasFactory;

    public function diaryEntry()
    {
        return $this->belongsTo(DiaryEntries::class, 'diary_entry_id');
    }
}
