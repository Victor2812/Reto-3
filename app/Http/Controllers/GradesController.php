<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Builder;

class GradesController extends Controller
{
    protected function applyYearFilter(Request $request, Builder $yearsQuery)
    {
        $ystart = $request->query('ystart');
        $yend = $request->query('yend');

        if ($ystart) {
            $yearsQuery->startYearIsGreaterThan($ystart);
        }

        if ($yend) {
            $yearsQuery->endYearIsLessThan($yend);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener información desde base de datos
        $years = SchoolYear::orderBy('end', 'desc');
        $newestYear = SchoolYear::newestYear()->first();
        $oldestYear = SchoolYear::oldestYear()->first();

        // Aplicar filtros
        $this->applyYearFilter($request, $years);
        
        return view('grades.index', [
            'years' => $years->paginate($perPage = 4, $columns = ['*'], $pageName = 'years'),
            'newestYear' => $newestYear,
            'oldestYear' => $oldestYear,

            // Old values
            'old_ystart' => $request->query('ystart'),
            'old_yend' => $request->query('yend'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // comprobamos que se han introducido datos
        $request->validate([
            'nombre' => 'required',
        ]);

        $nombre = $request->nombre;

        $grade = new Grade;
        $grade->name = $nombre;
        
        // guardamos el nuevo grado
        $grade->save();
        return view('grades.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
