<?php

namespace App\Http\Controllers;

use App\Models\DualSheet;
use App\Models\FollowUp;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FollowUpsController extends Controller
{
    const ASSISTANTS = [
        1 => 'FA + AL + FE',
        2 => 'FA + FE',
        3 => 'FA + AL',
    ];

    const TYPES = [
        1 => 'Presencial',
        2 => 'Telefónica',
        3 => 'Correo electrónico',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DualSheet $dualSheet)
    {
        $student = $dualSheet->student;
        $followUps = $dualSheet->followUps()->latest();

        return view('followUps.index', [
            'sheet' => $dualSheet,
            'student' => $student,
            'followUps' => $followUps->paginate(13),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DualSheet $dualSheet)
    {
        return view('followUps.create', [
            'sheet' => $dualSheet,
            'types' => self::TYPES,
            'assistants' => self::ASSISTANTS,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DualSheet $dualSheet)
    {
        $request->validate([
            'date' => 'required|date',
            'assistants' => 'required|numeric|min:1|max:3',
            'type' => 'required|numeric|min:1|max:3',
            'objetives' => 'required|string',
            'commented_issues' => 'required|string',
        ]);

        $followUp = new FollowUp([
            'sheet_id' => $dualSheet->id,
            'meeting_date' => $request->date,
            'assistants' => $request->assistants,
            'type' => $request->type,
            'objetives' => $request->objetives,
            'commented_issues' => $request->commented_issues,
        ]);
        $followUp->save();

        return Redirect::route('dualSheets.followUps.index', [
            $dualSheet->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DualSheet $dualSheet, FollowUp $followUp)
    {
        $student = $dualSheet->student;

        return view('followUps.show', [
            'sheet' => $dualSheet,
            'student' => $student,
            'followUp' => $followUp,
            'types' => self::TYPES,
            'assistants' => self::ASSISTANTS
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DualSheet $dualSheet, FollowUp $followUp)
    {
        $student = $dualSheet->student;
        return view('followUps.edit', [
            'sheet' => $dualSheet,
            'student' => $student,
            'followUp' => $followUp,
            'types' => self::TYPES,
            'assistants' => self::ASSISTANTS
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DualSheet $dualSheet, FollowUp $followUp)
    {
        $request->validate([
            'date' => 'required|date',
            'assistants' => 'required|numeric|min:1|max:3',
            'type' => 'required|numeric|min:1|max:3',
            'objetives' => 'required|string',
            'commented_issues' => 'required|string',
        ]);

        $followUp->meeting_date = $request->date;
        $followUp->assistants = $request->assistants;
        $followUp->type = $request->type;
        $followUp->objetives = $request->objetives;
        $followUp->commented_issues = $request->commented_issues;

        $followUp->save();

        return Redirect::route('dualSheets.followUps.show', [
            $dualSheet->id,
            $followUp->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DualSheet $dualSheet, FollowUp $followUp)
    {
        FollowUp::destroy($followUp->id);
        return Redirect::route('dualSheets.followUps.index', [
            $dualSheet->id,
        ]);
    }
}
