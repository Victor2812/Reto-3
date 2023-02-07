<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobEvaluation>
 */
class JobEvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'attitude_and_disposition' => 0,
            'attitude_and_disposition_observation' => '',
            'timeliness' => 0,
            'timeliness_observation' => '',
            'responsability' => 0,
            'responsability_observation' => '',
            'problem_solving_capacity' => 0,
            'problem_solving_capacity_observation' => '',
            'quality_at_work' => 0,
            'quality_at_work_observation' => '',
            'team_involvement_and_integration' => 0,
            'team_involvement_and_integration_observation' => '',
            'decision_making' => 0,
            'decision_making_observation' => '',
            'oral_and_written_communication_capacity' => 0,
            'oral_and_written_communication_capacity_observation' => '',
            'planning_and_organization_capacity' => 0,
            'planning_and_organization_capacity_observation' => '',
            'capacity_for_learning_and_assimilation' => 0,
            'capacity_for_learning_and_assimilation_observation' => ''
        ];
    }
}
