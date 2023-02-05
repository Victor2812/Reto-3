<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryEvaluation extends Model
{
    use HasFactory;

    protected $table = 'diary_evaluations';

    protected $fillable = [
        'effort_and_regularity',
        'effort_and_regularity_observation',
        'order_structure_presentation',
        'order_structure_presentation_observation',
        'content',
        'content_observation',
        'terminology_and_notation',
        'terminology_and_notation_observation',
        'quality_at_work',
        'quality_at_work_observation',
        'relates_concepts',
        'relates_concepts_observation',
        'reflection_on_learning',
        'reflection_on_learning_observation',
    ];

    public function dualSheet()
    {
        return $this->belongsTo(DualSheet::class, 'sheet_id');
    }
}
