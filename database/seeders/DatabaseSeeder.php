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
        $this->call([
            RoleSeeder::class,
            PeopleSeeder::class,
            SchoolYearsSeeder::class,
            GradesSeeder::class,
            CompaniesSeeder::class,
            FrasesSeeder::class,
        ]);        
    }
}
