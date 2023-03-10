<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEvaluation extends Model
{
    use HasFactory;

    protected $table = 'job_evaluations';

    protected $fillable = [
        'sheet_id',
        'attitude_and_disposition',
        'attitude_and_disposition_observation',
        'timeliness',
        'timeliness_observation',
        'responsability',
        'responsability_observation',
        'problem_solving_capacity',
        'problem_solving_capacity_observation',
        'quality_at_work',
        'quality_at_work_observation',
        'team_involvement_and_integration',
        'team_involvement_and_integration_observation',
        'decision_making',
        'decision_making_observation',
        'oral_and_written_communication_capacity',
        'oral_and_written_communication_capacity_observation',
        'planning_and_organization_capacity',
        'planning_and_organization_capacity_observation',
        'capacity_for_learning_and_assimilation',
        'capacity_for_learning_and_assimilation_observation',
    ];

    public function getAverage()
    {
        return (
            $this->attitude_and_disposition +
            $this->timeliness +
            $this->responsability +
            $this->problem_solving_capacity +
            $this->quality_at_work +
            $this->team_involvement_and_integration +
            $this->decision_making +
            $this->oral_and_written_communication_capacity +
            $this->planning_and_organization_capacity +
            $this->capacity_for_learning_and_assimilation
        ) / 10;
    }

    public function dualSheet()
    {
        return $this->belongsTo(DualSheet::class, 'sheet_id');
    }
}
