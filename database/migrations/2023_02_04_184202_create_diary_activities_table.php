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
        Schema::create('diary_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('reflection');
            $table->text('difficulties');
            
            $table->unsignedBigInteger('diary_entry_id');
            $table->foreign('diary_entry_id')->references('id')->on('diary_entries');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diary_activities');
    }
};
