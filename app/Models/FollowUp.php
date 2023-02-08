<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;

    protected $table = 'follow_ups';
    
    protected $fillable = [
        'sheet_id',
        'meeting_date',
        'assistants',
        'type',
        'objetives',
        'commented_issues'
    ];

    public function dualSheet()
    {
        return $this->belongsTo(DualSheet::class, 'sheet_id');
    }
}
