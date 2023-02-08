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
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('sheet_id');
            $table->foreign('sheet_id')->references('id')->on('dual_sheets')->onDelete('cascade');
            
            $table->date('meeting_date');
            $table->integer('assistants');
            $table->integer('type');
            $table->text('objetives');
            $table->text('commented_issues');

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
        Schema::dropIfExists('follow_ups');
    }
};
