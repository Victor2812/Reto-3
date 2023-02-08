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
        // Se utiliza este método y no una factory dado que no se quiere generar frases de manera masiva, sino que queremos tener unas predefinidas 

        $frase1 = new Frase;
        $frase1->frase = 'No deberías estar aquí';
        $frase1->save();

        $frase2 = new Frase;
        $frase2->frase = '¿Que estabas buscando?';
        $frase2->save();

        $frase3 = new Frase;
        $frase3->frase = '¿Te has perdido?';
        $frase3->save();

        $frase4 = new Frase;
        $frase4->frase = 'La pagina que estás buscando no existe';
        $frase4->save();

        $frase5 = new Frase;
        $frase5->frase = 'I dont always surf the web but when I do, I dont get lost';
        $frase5->save();

        $frase6 = new Frase;
        $frase6->frase = 'You found our 404 page. You have won a washing machine and a dryer';
        $frase6->save();

        $frase7 = new Frase;
        $frase7->frase = 'I used to be an adventurer like you. Then I took an arrow in the knee';
        $frase7->save();

        $frase8 = new Frase;
        $frase8->frase = 'Oops, page not found';
        $frase8->save();
        
    }
}
