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
        Schema::create('job_evaluations', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('sheet_id');
            $table->foreign('sheet_id')->references('id')->on('dual_sheets');

            $table->float('attitude_and_disposition');
            $table->text('attitude_and_disposition_observation');

            $table->float('timeliness');
            $table->text('timeliness_observation');

            $table->float('responsability');
            $table->text('responsability_observation');

            $table->float('problem_solving_capacity');
            $table->text('problem_solving_capacity_observation');

            $table->float('quality_at_work');
            $table->text('quality_at_work_observation');

            $table->float('team_involvement_and_integration');
            $table->text('team_involvement_and_integration_observation');

            $table->float('decision_making');
            $table->text('decision_making_observation');

            $table->float('oral_and_written_communication_capacity');
            $table->text('oral_and_written_communication_capacity_observation');

            $table->float('planning_and_organization_capacity');
            $table->text('planning_and_organization_capacity_observation');

            $table->float('capacity_for_learning_and_assimilation');
            $table->text('capacity_for_learning_and_assimilation_observation');

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
        Schema::dropIfExists('job_evaluations');
    }
};
