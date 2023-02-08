<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryEntries extends Model
{
    use HasFactory;

    protected $table = 'diary_entries';

    public function toText()
    {
        $a = $this->from_date;
        $b = $this->to_date;

        return "$a - $b";
    }

    public function dualSheet()
    {
        return $this->belongsTo(DualSheet::class, 'sheet_id');
    }

    public function activities()
    {
        return $this->hasMany(DiaryActivities::class, 'diary_entry_id');
    }

    public function comments()
    {
        return $this->hasMany(DiaryComments::class, 'diary_entry_id');
    }
}
