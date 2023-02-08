<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use App\Models\DualSheet;
use App\Models\Person;
use App\Models\Grade;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

        $students->hasStudentDualSheetsGraduated(!$notactive);

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
        $empresas = Company::all();
        $academicTutors = Person::studentTutors();
        $courses = Course::all();
        $schoolYears = SchoolYear::all();

        return view('students.create', [
            'empresa' => $empresas,
            'academicTutors' => $academicTutors->get(),
            'courses' => $courses,
            'schoolYears' => $schoolYears,
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
        // Esta funcion recoge el POST del formulario de creación
        $request->validate([
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'dni' => 'required|string|min:9|max:9',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:16',
            'pass' => 'required|string|min:4',
        ]);

        $person = new Person([
            'name'=> $request->post('name'),
            'surname'=> $request->post('surname'),
            'dni'=> $request->post('dni'),
            'email'=> $request->post('email'),
            'phone'=> $request->post('phone'),
            'role_id'=> config('roles.ALUMNO'),
        ]);
        $person->save();

        $user = new User([
            'name' => $request->post('name') . $request->post('surname'),
            'person_id' => $person->id,
            'password' => Hash::make($request->post('pass')),
        ]);
        $user->save();

        return Redirect::route('students.edit', [$person->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Person $student
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $student)
    {
        if (($sheetId = (int)$request->query('sheet')) > 0) {
            $sheet = DualSheet::where('id', $sheetId)->first();

            if (!$sheet || $sheet->student_id != $student->id) {
                abort(404);
            }
        } else {
            $sheet = $student->studentSheets()->latest()->first();
        }
        return view('students.show', [
            'student' => $student,
            'sheet' => $sheet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Person $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $student)
    {
        $grades = Grade::all();
        $empresas = Company::all();
        $academicTutors = Person::studentTutors();
        $companyTutors = Person::companyTutors();
        $schoolYears = SchoolYear::all();

        return view('students.edit', [
            'student' => $student,
            'grades' => $grades,
            'empresa' => $empresas,
            'academicTutors' => $academicTutors->get(),
            'companyTutors' => $companyTutors->get(),
            'schoolYears' => $schoolYears,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Person $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $student)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'dni' => 'required|string|min:9|max:9',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:16',
            'pass' => 'nullable|string|min:4',
        ]);

        $student->name = $request->post('name');
        $student->surname = $request->post('surname');
        $student->dni = $request->post('dni');
        $student->email = $request->post('email');
        $student->phone = $request->post('phone');
        $student->email = $request->post('name');

        $student->save();

        if ($pass = $request->post('pass')) {
            $user = $student->user;
            $user->password = Hash::make($pass);
            $user->save();
        }

        return Redirect::route('students.edit', [$student->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Person $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $student)
    {
        Person::destroy($student->id);
        return Redirect::route('students.index');
    }
}
