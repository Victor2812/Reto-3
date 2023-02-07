<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SchoolYearsController extends Controller
{
    public function create()
    {
        $latest = SchoolYear::orderBy('end', 'desc')->first();

        if ($latest) {
            $year = new SchoolYear([
                'start' => $latest->end,
                'end' => date('Y-m-d', strtotime('+1 year', strtotime($latest->end))),
            ]);
        } else {
            $year = new SchoolYear([
                'start' => date('Y-m-d', strtotime('now')),
                'end' => date('Y-m-d', strtotime('+1 year')),
            ]);
        }

        $year->save();

        return Redirect::route('grades.index');
    }
}
