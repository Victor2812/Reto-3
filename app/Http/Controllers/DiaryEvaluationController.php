<?php

namespace App\Http\Controllers;

use App\Models\DiaryEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DiaryEvaluationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(DiaryEvaluation::class, 'diaryEvaluation');
    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DiaryEvaluation $diaryEvaluation)
    {
        $student = $diaryEvaluation->dualSheet->student;
        
        return view('diaryEvaluations.show', [
            'student' => $student,
            'evaluation' => $diaryEvaluation,
            'average' => round($diaryEvaluation->getAverage(), 2),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DiaryEvaluation $diaryEvaluation)
    {
        $student = $diaryEvaluation->dualSheet->student;

        $punctuation = [
            'Insuficiente' => 2,
            'Suficiente' => 5,
            'Bien' => 6,
            'Notable' => 8,
            'Excelente' => 10,
        ];

        return view("diaryEvaluations.edit", [
            'student' => $student,
            'evaluation' => $diaryEvaluation,
            'punctuation' => $punctuation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  DiaryEvaluation $diaryEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiaryEvaluation $diaryEvaluation)
    {
        $request->validate([
            "effort_and_regularity" => "required|numeric|in:2,5,6,8,10",
            "effort_and_regularity_observation" => "nullable|string|min:0",
            "order_structure_presentation" => "required|numeric|in:2,5,6,8,10",
            "order_structure_presentation_observation" => "nullable|string|min:0",
            "content" => "required|numeric|in:2,5,6,8,10",
            "content_observation" => "nullable|string|min:0",
            "terminology_and_notation" => "required|numeric|in:2,5,6,8,10",
            "terminology_and_notation_observation" => "nullable|string|min:0",
            "quality_at_work" => "required|numeric|in:2,5,6,8,10",
            "quality_at_work_observation" => "nullable|string|min:0",
            "relates_concepts" => "required|numeric|in:2,5,6,8,10",
            "relates_concepts_observation" => "nullable|string|min:0",
            "reflection_on_learning" => "required|numeric|in:2,5,6,8,10",
            "reflection_on_learning_observation" => "nullable|string|min:0",
        ]);

        $diaryEvaluation->effort_and_regularity = $request->effort_and_regularity;
        $diaryEvaluation->effort_and_regularity_observation = $request->post('effort_and_regularity_observation', '');

        $diaryEvaluation->order_structure_presentation = $request->order_structure_presentation;
        $diaryEvaluation->order_structure_presentation_observation = $request->post('order_structure_presentation_observation', '');

        $diaryEvaluation->content = $request->content;
        $diaryEvaluation->content_observation = $request->post('content_observation', '');

        $diaryEvaluation->terminology_and_notation = $request->terminology_and_notation;
        $diaryEvaluation->terminology_and_notation_observation = $request->post('terminology_and_notation_observation', '');

        $diaryEvaluation->quality_at_work = $request->quality_at_work;
        $diaryEvaluation->quality_at_work_observation = $request->post('quality_at_work_observation', '');

        $diaryEvaluation->relates_concepts = $request->relates_concepts;
        $diaryEvaluation->relates_concepts_observation = $request->post('relates_concepts_observation', '');

        $diaryEvaluation->reflection_on_learning = $request->reflection_on_learning;
        $diaryEvaluation->reflection_on_learning_observation = $request->post('reflection_on_learning_observation', '');

        $diaryEvaluation->save();

        return Redirect::route('diaryEvaluations.show', [$diaryEvaluation->id]);
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
