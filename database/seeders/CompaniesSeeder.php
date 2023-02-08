<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Course;
use App\Models\DiaryEvaluation;
use App\Models\DualSheet;
use App\Models\JobEvaluation;
use App\Models\Person;
use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutorsArray = Person::allAcademicTutors()->get()->toArray();
        $studentsArray = Person::students()->get()->toArray();
        $coursesArray = Course::where('has_dual', '=', 1)->get()->toArray();
        $schoolYearsArray = SchoolYear::all()->toArray();

        $trueFalse = [true, false];

        foreach (Person::where('role_id', '=', 3)->get() as $person) {
            $company = Company::factory()->create([
                'person_id' => $person->id,
            ]);

            $tutor = $tutorsArray[array_rand($tutorsArray)];
            $student = $studentsArray[array_rand($studentsArray)];
            $course = $coursesArray[array_rand($coursesArray)];
            $schoolYear = $schoolYearsArray[array_rand($schoolYearsArray)];

            $active = $trueFalse[array_rand($trueFalse)];
            $graduated = !$active
                ? $trueFalse[array_rand($trueFalse)]
                : false;

            $sheet = DualSheet::factory()->create([
                'tutor_id' => $tutor['id'],
                'student_id' => $student['id'],
                'company_id' => $company->id,
                'course_id' => $course['id'],
                'school_year_id' => $schoolYear['id'],
                'active' => $active,
                'graduated' => $graduated,
            ]);

            DiaryEvaluation::factory()->create([
                'sheet_id' => $sheet->id,
            ]);

            JobEvaluation::factory()->create([
                'sheet_id' => $sheet->id,
            ]);
        }
    }
}
