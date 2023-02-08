<?php

namespace App\Http\Controllers;

use App\Models\DualSheet;
use App\Models\Person;
use Illuminate\Http\Request;

class FollowUpsController extends Controller
{
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
    public function create()
    {
        return view('followUps.create');
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
    public function show($student)
    {
        $alumno = Person::where('id', '=', $student)->get()->first();

        return view('followUps.show', [
            'student' => $alumno,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $student)
    {
        //
        return view("followUps.edit", [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
