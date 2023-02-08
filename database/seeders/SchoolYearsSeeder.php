<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=4; $i > 0; $i--) {
            $i2 = $i-1;
            SchoolYear::factory()->create([
                'start' => (new \DateTime())->modify("-$i year"),
                'end' => (new \DateTime())->modify("-$i2 year"),
            ]);
        }
    }
}
