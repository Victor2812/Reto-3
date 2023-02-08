<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use App\Models\DualSheet;
use App\Models\Person;
use App\Models\Grade;
use App\Models\JobEvaluation;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyEvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  JobEvaluation $companyEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(JobEvaluation $companyEvaluation)
    {
        $student = $companyEvaluation->dualSheet->student;

        return view('companyEvaluations.show', [
            'student' => $student,
            'evaluation' => $companyEvaluation,
            'average' => round($companyEvaluation->getAverage(), 2),
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JobEvaluation $companyEvaluation)
    {
        $student = $companyEvaluation->dualSheet->student;

        $punctuation = [
            'Insuficiente' => 2,
            'Suficiente' => 5,
            'Bien' => 6,
            'Notable' => 8,
            'Excelente' => 10,
        ];

        return view("companyEvaluations.edit", [
            'student' => $student,
            'evaluation' => $companyEvaluation,
            'punctuation' => $punctuation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobEvaluation $companyEvaluation)
    {
        $request->validate([
            "attitude_and_disposition" => "required|numeric|in:2,5,6,8,10",
            "attitude_and_disposition_observation" => "nullable|string|min:0",
            "timeliness" => "required|numeric|in:2,5,6,8,10",
            "timeliness_observation" => "nullable|string|min:0",
            "responsability" => "required|numeric|in:2,5,6,8,10",
            "responsability_observation" => "nullable|string|min:0",
            "problem_solving_capacity" => "required|numeric|in:2,5,6,8,10",
            "problem_solving_capacity_observation" => "nullable|string|min:0",
            "quality_at_work" => "required|numeric|in:2,5,6,8,10",
            "quality_at_work_observation" => "nullable|string|min:0",
            "team_involvement_and_integration" => "required|numeric|in:2,5,6,8,10",
            "team_involvement_and_integration_observation" => "nullable|string|min:0",
            "decision_making" => "required|numeric|in:2,5,6,8,10",
            "decision_making_observation" => "nullable|string|min:0",
            "oral_and_written_communication_capacity" => "required|numeric|in:2,5,6,8,10",
            "oral_and_written_communication_capacity_observation" => "nullable|string|min:0",
            "planning_and_organization_capacity" => "required|numeric|in:2,5,6,8,10",
            "planning_and_organization_capacity_observation" => "nullable|string|min:0",
            "capacity_for_learning_and_assimilation" => "required|numeric|in:2,5,6,8,10",
            "capacity_for_learning_and_assimilation_observation" => "nullable|string|min:0",
        ]);

        $companyEvaluation->attitude_and_disposition = $request->attitude_and_disposition;
        $companyEvaluation->attitude_and_disposition_observation = $request->post('attitude_and_disposition_observation', '');

        $companyEvaluation->timeliness = $request->timeliness;
        $companyEvaluation->timeliness_observation = $request->post('timeliness_observation', '');

        $companyEvaluation->responsability = $request->responsability;
        $companyEvaluation->responsability_observation = $request->post('responsability_observation', '');

        $companyEvaluation->problem_solving_capacity = $request->problem_solving_capacity;
        $companyEvaluation->problem_solving_capacity_observation = $request->post('problem_solving_capacity_observation', '');

        $companyEvaluation->quality_at_work = $request->quality_at_work;
        $companyEvaluation->quality_at_work_observation = $request->post('quality_at_work_observation', '');

        $companyEvaluation->team_involvement_and_integration = $request->team_involvement_and_integration;
        $companyEvaluation->team_involvement_and_integration_observation = $request->post('team_involvement_and_integration_observation', '');

        $companyEvaluation->decision_making = $request->decision_making;
        $companyEvaluation->decision_making_observation = $request->post('decision_making_observation', '');

        $companyEvaluation->oral_and_written_communication_capacity = $request->oral_and_written_communication_capacity;
        $companyEvaluation->oral_and_written_communication_capacity_observation = $request->post('oral_and_written_communication_capacity_observation', '');

        $companyEvaluation->planning_and_organization_capacity = $request->planning_and_organization_capacity;
        $companyEvaluation->planning_and_organization_capacity_observation = $request->post('planning_and_organization_capacity_observation', '');

        $companyEvaluation->capacity_for_learning_and_assimilation = $request->capacity_for_learning_and_assimilation;
        $companyEvaluation->capacity_for_learning_and_assimilation_observation = $request->post('capacity_for_learning_and_assimilation_observation', '');

        $companyEvaluation->save();

        return Redirect::route('companyEvaluations.show', [$companyEvaluation->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
