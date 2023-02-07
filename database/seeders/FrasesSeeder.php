<?php

namespace Database\Seeders;

use App\Models\Frase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frase::factory()->create([
            'frase' => 'No deberías estar aquí',
        ]);
    }
}
