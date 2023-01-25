<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            /*
                No podría ser el año de una fecha +1 por "cisnes negros" que podrían llegar a ocurrir.
                Un ejemplo sería la pandemia por el COVID. Donde, por suerte, pudimos seguir teniendo
                clase.
            */
            $table->date('start'); // Año de inicio ej. 2022
            $table->date('end'); // Año de fin ej. 2023
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_years');
    }
};
