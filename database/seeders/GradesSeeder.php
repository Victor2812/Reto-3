<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $grade = Grade::factory()->create([
                'name' => "Gado $i",
            ]);

            for ($j=1; $j < 5; $j++) {
                Course::factory()->create([
                    'grade_id' => $grade->id,
                    'name' => "$j",
                    'has_dual' => $j > 1,
                ]);
            }
        }
    }
}
