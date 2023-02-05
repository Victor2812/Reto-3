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
        Schema::create('diary_evaluations', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('sheet_id');
            $table->foreign('sheet_id')->references('id')->on('dual_sheets');

            $table->float('effort_and_regularity');
            $table->text('effort_and_regularity_observation');

            $table->float('order_structure_presentation');
            $table->text('order_structure_presentation_observation');

            $table->float('content');
            $table->text('content_observation');

            $table->float('terminology_and_notation');
            $table->text('terminology_and_notation_observation');

            $table->float('quality_at_work');
            $table->text('quality_at_work_observation');

            $table->float('relates_concepts');
            $table->text('relates_concepts_observation');

            $table->float('reflection_on_learning');
            $table->text('reflection_on_learning_observation');
            

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
        Schema::dropIfExists('diary_evaluations');
    }
};
