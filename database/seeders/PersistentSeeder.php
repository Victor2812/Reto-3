<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Course;
use App\Models\DiaryEvaluation;
use App\Models\DualSheet;
use App\Models\JobEvaluation;
use App\Models\Person;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersistentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coordinator = Person::factory()->create([
            'dni' => '12345678A',
            'name' => 'Victor',
            'role_id' => config('roles.COORDINADOR'),
        ]);

        User::factory()->create([
            'person_id' => $coordinator->id,
        ]);

        $tutor = Person::factory()->create([
            'dni' => '12345678B',
            'name' => 'Tania',
            'role_id' => config('roles.FACTILITADOR_ACADEMICO'),
        ]);

        User::factory()->create([
            'person_id' => $tutor->id,
        ]);

        $student = Person::factory()->create([
            'dni' => '12345678C',
            'name' => 'Gaizka',
            'role_id' => config('roles.ALUMNO'),
        ]);

        User::factory()->create([
            'person_id' => $student->id,
        ]);

        $company = Company::all()->random();
        $course = Course::where('has_dual', true)->get()->random();
        $year = SchoolYear::orderBy('id', 'desc')->first();

        $sheet = DualSheet::factory()->create([
            'tutor_id' => $tutor->id,
            'student_id' => $student->id,
            'company_id' => $company->id,
            'course_id' => $course->id,
            'school_year_id' => $year->id,
            'active' => true,
            'graduated' => false,
        ]);

        DiaryEvaluation::factory()->create([
            'sheet_id' => $sheet->id,
        ]);

        JobEvaluation::factory()->create([
            'sheet_id' => $sheet->id,
        ]);
    }
}
