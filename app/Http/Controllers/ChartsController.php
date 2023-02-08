<?php

namespace App\Http\Controllers;

use App\Models\DualSheet;
use App\Models\SchoolYear;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    //

    public function index(Request $request)
    {
        return view('charts.index');
    }

    protected function getCurrentSchoolYear()
    {
        $month = idate('m');
        $year = idate('Y');
        
        if ($month >= 7) {
            // usar start
            $currentYear = SchoolYear::whereYear('start', $year)->first();
        } else {
            // usar end
            $currentYear = SchoolYear::whereYear('end', $year)->first();
        }

        return $currentYear;
    }

    protected function getYearStats(SchoolYear $year)
    {
        $a = 0;
        $f = 0;

        if ($year) {
            $sheets = DualSheet::where('school_year_id', $year->id)->get();
            foreach ($sheets as $sheet) {
                if ($sheet->getAverage() >= 5) {
                    $a++;
                } else {
                    $f++;
                }
            }
        }

        return [$a, $f];
    }

    public function stats()
    {
        $currentYear = $this->getCurrentSchoolYear();

        if (!$currentYear) {
            $currentYear = SchoolYear::latest()->first();
        }

        $data = $this->getYearStats($currentYear);
    

        return new JsonResponse([
            [
                "item" => "Aprobado",
                "count"=> $data[0],
                "color" => "#0C4395",
            ],
            [
                "item" => "Suspendido",
                "count" => $data[1],
                "color" => "#24C8AF",
            ]
        ]);
    }

    public function lineData()
    {
        $years = SchoolYear::all();

        $data = [];

        foreach($years as $year) {
            $stats = $this->getYearStats($year);
            $data[] = [
                'year' => $year->toSmallText(),
                'count' => [
                    'aprobados' => $stats[0],
                    'suspensos' => $stats[1],
                ]
            ];
        }

        return new JsonResponse($data);
    }
}
