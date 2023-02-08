<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiaryEvaluation>
 */
class DiaryEvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'effort_and_regularity' => 0,
            'effort_and_regularity_observation' => '',
            'order_structure_presentation' => 0,
            'order_structure_presentation_observation' => '',
            'content' => 0,
            'content_observation' => '',
            'terminology_and_notation' => 0,
            'terminology_and_notation_observation' => '',
            'quality_at_work' => 0,
            'quality_at_work_observation' => '',
            'relates_concepts' => 0,
            'relates_concepts_observation' => '',
            'reflection_on_learning' => 0,
            'reflection_on_learning_observation' => ''
        ];
    }
}
