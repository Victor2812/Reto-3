<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Person;
use App\Models\Role;
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
        foreach (config('roles') as $id => $name) {
            Role::factory()->create([
                'id' => $id,
                'name' => $name,
            ]);
        }

        // Crear personas
        Person::factory()->count(500)->state(new Sequence(
            fn ($sequence) => ['role_id' => Role::all()->random()]
        ))->create();
    }
}
