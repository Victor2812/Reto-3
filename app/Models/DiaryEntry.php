<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryEntry extends Model
{
    use HasFactory;

    protected $table = 'diary_entries';

    protected $fillable = [
        'sheet_id',
        'from_date',
        'to_date',
    ];

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

    public function activity()
    {
        return $this->hasOne(DiaryActivity::class, 'diary_entry_id');
    }

    public function comments()
    {
        return $this->hasMany(DiaryComment::class, 'diary_entry_id');
    }
}
