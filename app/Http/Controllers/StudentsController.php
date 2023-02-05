<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use App\Models\Person;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class StudentsController extends Controller
{
    /**
    * Create the controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // Establecer la política de autorización al recurso
        //$this->authorizeResource(Person::class, 'person');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // recoger lisado de alumno de la database
        $students = Person::students();
        $courses = Course::hasDual();
        $academicTutors = Person::studentTutors();
        $companies = Company::all();
        $companyTutors = Person::companyTutors();
        $schoolYears = SchoolYear::all();

        // recoger el filtro del formulario buscador
        $search = $request->query('search');

        // Aplicar texto de busqueda
        if ($search) {
            $students->bySearchTerms($search);
        }

        return view('students.index', [
            // info de la DB
            'students' => $students->paginate(13),
            'courses' => $courses->get(),
            'academicTutors' => $academicTutors->get(),
            'companies' => $companies,
            'companyTutors' => $companyTutors->get(),
            'schoolYears' => $schoolYears,
            // terminos de busqueda previos
            'old_search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Esta funcion recoge el POST del formulario de creación
        $request->validate([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Person $student
     * @return \Illuminate\Http\Response
     */
    public function show(Person $student)
    {
        $sheets = $student->studentSheets()->latest()->get();
        return view('students.show', [
            'student' => $student,
            'sheets' => $sheets,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
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
