<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;

class GradesController extends Controller
{
    const N_COURSES = 4;

    public function __construct()
    {
        $this->authorizeResource(Grade::class, 'grade');
    }
    
    protected function applyYearFilter(Request $request, Builder $query)
    {
        $ystart = $request->query('ystart');
        $yend = $request->query('yend');

        if ($ystart) {
            $query->startYearIsGreaterThan($ystart);
        }

        if ($yend) {
            $query->endYearIsLessThan($yend);
        }
    }

    protected function applyGradeFilter(Request $request, Builder $query)
    {
        $gsearch = $request->query('gsearch');

        if (strlen(trim($gsearch)) > 0) {
            $query->bySearch($gsearch);
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

        $grades = Grade::orderBy('id', 'desc');

        // Aplicar filtros
        $this->applyYearFilter($request, $years);
        $this->applyGradeFilter($request, $grades);
        
        return view('grades.index', [
            // Fechas
            'years' => $years->paginate($perPage = 4, $columns = ['*'], $pageName = 'years'),
            'newestYear' => $newestYear,
            'oldestYear' => $oldestYear,

            // Grados
            'grades' => $grades->paginate(13),

            // Valores antiguos
            'old_ystart' => $request->query('ystart'),
            'old_yend' => $request->query('yend'),
            'old_gsearch' => $request->query('gsearch'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('grades.create', [
            'nCourses' => self::N_COURSES,
        ]);
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
            'name' => 'required|string|min:1',
            'courses' => 'required|array|min:1',
            'courses.*' => 'required|string|min:1'
        ]);

        $grade = new Grade([
            'name' => trim($request->name),
        ]);
        $grade->save();
        
        $courseList = [];
        $courses = $request->courses;
        // Añadir los cursos
        for ($i = 0; $i < self::N_COURSES; $i++) {
            array_push($courseList, [
                'name' => $i + 1,
                'has_dual' => isset($courses[$i]),
            ]);
        }
        $grade->courses()->createMany($courseList);

        return Redirect::route('grades.show', [$grade->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        return Redirect::route('grades.edit', [$grade->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('grades.edit', [
            'grade' => $grade,
            'courses' => $grade->courses()->get(),
        ]);
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
        // comprobamos que se han introducido datos
        $request->validate([
            'name' => 'required|string|min:1',
            'courses' => 'required|array|min:1',
            'courses.*' => 'required|string|min:1'
        ]);
        
        $grade->name = trim($request->name);
        $courses = $request->courses;
        $courseList = $grade->courses()->get();

        // Actualizar información de los cursos
        foreach ($courseList as $course) {
            $course->has_dual = isset($courses[$course->id]);
            $course->save();
        }

        $grade->save();
        return Redirect::route('grades.edit', [$grade->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return Redirect::route('grades.index', [$grade->id]);
    }
}
