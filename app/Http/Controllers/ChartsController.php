<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    //

    public function index(Request $request)
    {
        return view('charts.index');
    }

    public function failsChart()
    {
        return new JsonResponse([
            "aprobados"=>90,
            "suspendidos"=>10
        ]);
    }
}
