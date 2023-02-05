<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryComments extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Person::class);
    }

    public function diaryEntry()
    {
        return $this->belongsTo(DiaryEntries::class, 'diary_entry_id');
    }
}
