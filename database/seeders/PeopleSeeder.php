<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::factory()->count(400)->state(new Sequence(
            fn ($sequence) => ['role_id' => Role::all()->random()]
        ))->create();

        
        // Crear usuarios
        foreach (Person::where('role_id', '!=', 3)->get() as $person) {
            User::factory()->create([
                'person_id' => $person->id,
            ]);
        }
    }
}
