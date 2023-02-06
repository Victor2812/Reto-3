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
        $request->validate([
            'search' => 'nullable|string|max:255',
            'course' => 'nullable|numeric|not_in:0',
            'atutor' => 'nullable|numeric|not_in:0',
            'ctutor' => 'nullable|numeric|not_in:0',
            'company' => 'nullable|numeric|not_in:0',
            'syear' => 'nullable|numeric|not_in:0',
            'graduated' => 'nullable|numeric|not_in:0|max:1',
            'notactive' => 'nullable|numeric|not_in:0|max:1',
        ]);

        // recoger lisado de alumno de la database
        $students = Person::students();
        $courses = Course::hasDual();
        $academicTutors = Person::studentTutors();
        $companies = Company::all();
        $companyTutors = Person::companyTutors();
        $schoolYears = SchoolYear::all();

        // recoger el filtro del formulario buscador
        $search = $request->query('search');
        $course = $request->query('course');
        $atutor = $request->query('atutor');
        $company = $request->query('company');
        $syear = $request->query('syear');
        $graduated = (bool)$request->query('graduated');
        $notactive = (bool)$request->query('notactive');

        // Aplicar texto de busqueda
        if ($search) {
            $students->bySearchTerms($search);
        }

        if ($course) {
            $students->isStudentOfGrade($course);
        }

        if ($atutor) {
            $students->isStudentOfTutor($atutor);
        }

        if ($company) {
            $students->isStudentOfCompany($company);
        }

        if ($syear) {
            $students->isStudentOfSchoolYear($syear);
        }

        if ($graduated) {
            $students->hasStudentDualSheetsGraduated();
        }

        if ($notactive) {
            $students->hasStudentDualSheetsGraduated(false);
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
            'old_course' => $course,
            'old_atutor' => $atutor,
            'old_company' => $company,
            'old_syear' => $syear,
            'old_graduated' => $graduated,
            'old_notactive' => $notactive,
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
