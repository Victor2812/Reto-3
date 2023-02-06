<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Course;
use App\Models\DualSheet;
use App\Models\Grade;
use App\Models\Person;
use App\Models\Role;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Crear roles
        foreach (config('roles') as $name => $id) {
            Role::factory()->create([
                'id' => $id,
                'name' => $name,
            ]);
        }

        // Crear personas
        Person::factory()->count(500)->state(new Sequence(
            fn ($sequence) => ['role_id' => Role::all()->random()]
        ))->create();

        
        // Crear personas
        foreach (Person::where('role_id', '!=', 3)->get() as $person) {
            User::factory()->create([
                'person_id' => $person->id,
            ]);
        }

        // Años escolares
        for ($i=4; $i > 0; $i--) {
            $i2 = $i-1;
            SchoolYear::factory()->create([
                'start' => (new \DateTime())->modify("-$i year"),
                'end' => (new \DateTime())->modify("-$i2 year"),
            ]);
        }

        // Grados
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

        // Empresas y fichas duales
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

            DualSheet::factory()->create([
                'tutor_id' => $tutor['id'],
                'student_id' => $student['id'],
                'company_id' => $company->id,
                'course_id' => $course['id'],
                'school_year_id' => $schoolYear['id'],
                'active' => $active,
                'graduated' => $graduated,
            ]);
        }
    }
}
