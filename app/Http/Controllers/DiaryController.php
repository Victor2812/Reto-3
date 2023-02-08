<?php

namespace App\Http\Controllers;

use App\Models\DiaryActivity;
use App\Models\DiaryComment;
use App\Models\DiaryEntry;
use App\Models\DualSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Person;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DualSheet $dualSheet)
    {
        $this->authorize('view', $dualSheet);

        $student = $dualSheet->student;
        $entries = $dualSheet->diaryEntries()->latest();

        return view('diaries.index', [
            'sheet' => $dualSheet,
            'student' => $student,
            'entries' => $entries->paginate(13),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DualSheet $dualSheet)
    {
        $this->authorize('createDiaryEntries', $dualSheet);

        return view('diaries.create', [
            'sheet' => $dualSheet
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
        $this->authorize('createDiaryEntries', $dualSheet);

        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'activities' => 'required|string',
            'reflection' => 'required|string',
            'difficulties' => 'required|string',
        ]);

        $entry = new DiaryEntry([
            'sheet_id' => $dualSheet->id,
            'from_date' => $request->start,
            'to_date' => $request->end,
        ]);
        $entry->save();

        $activity = new DiaryActivity([
            'diary_entry_id' => $entry->id,
            'name' => $request->activities,
            'reflection' => $request->reflection,
            'difficulties' => $request->difficulties,
        ]);
        $activity->save();

        return Redirect::route('dualSheets.diaryEntries.index', [
            $dualSheet->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DualSheet $dualSheet, DiaryEntry $diaryEntry)
    {
        $this->authorize('view', $diaryEntry);

        if ($comment = $request->comment) {
            $comment = new DiaryComment([
                'diary_entry_id' => $diaryEntry->id,
                'person_id' => $request->user()->person_id,
                'text' => $comment,
            ]);
            $comment->save();

            // quitar datos del GET
            return Redirect::route('dualSheets.diaryEntries.show', [
                $dualSheet->id,
                $diaryEntry->id,
            ]);
        }

        $student = $dualSheet->student;

        return view('diaries.show', [
            'student' => $student,
            'entry' => $diaryEntry,
            'activity' => $diaryEntry->activity,
            'comments' => $diaryEntry->comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DualSheet $dualSheet, DiaryEntry $diaryEntry)
    {
        $this->authorize('update', $diaryEntry);

        return view('diaries.edit', [
            'sheet' => $dualSheet,
            'entry' => $diaryEntry,
            'activity' => $diaryEntry->activity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DualSheet $dualSheet, DiaryEntry $diaryEntry)
    {
        $this->authorize('update', $diaryEntry);

        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'activities' => 'required|string',
            'reflection' => 'required|string',
            'difficulties' => 'required|string',
        ]);

        $diaryEntry->from_date = $request->start;
        $diaryEntry->to_date = $request->end;
        $diaryEntry->save();

        $activity = $diaryEntry->activity;

        $activity->name = $request->activities;
        $activity->reflection = $request->reflection;
        $activity->difficulties = $request->difficulties;
        $activity->save();

        return Redirect::route('dualSheets.diaryEntries.index', [
            $dualSheet->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DualSheet $dualSheet, DiaryEntry $diaryEntry)
    {
        $this->authorize('delete', $diaryEntry);

        DiaryEntry::destroy($diaryEntry->id);
        return Redirect::route('dualSheets.diaryEntries.index', [
            $dualSheet->id,
        ]);
    }
}
