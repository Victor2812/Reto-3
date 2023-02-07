<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Person;
use App\Models\Role;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class TutorsController extends Controller
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
            'role' => 'nullable|numeric|not_in:0',
            'grade' => 'nullable|numeric|not_in:0',
            'company' => 'nullable|numeric|not_in:0|max:1',
        ]);

        // Información de la base de datos
        $tutors = Person::allTutors();
        $roles = Role::all();
        $courses = Course::hasDual();
        $academicTutors = Person::studentTutors();
        $companies = Company::all();
        $companyTutors = Person::companyTutors();
        $schoolYears = SchoolYear::all();

        // Obtener filtros
        $search = $request->query('search');
        $role = (int)$request->query('role');
        $grade = (int)$request->query('grade');
        $company = (int)$request->query('company');

        // Aplicar texto de búsqueda
        if ($search) {
            $tutors->bySearchTerms($search);
        }

        if ($role > 0) {
            $tutors->where('role_id', '=', $role);
        }

        if ($grade > 0) {
            // ...
        }

        if ($company > 0) {
            // ...
        }

        return view('tutors.index', [
            // Información de la base de datos
            'tutors' => $tutors->paginate(13),
            'roles' => $roles,
            'grades' => [],
            'courses' => $courses,
            'academicTutors' => $academicTutors,
            'companyTutors' => $companyTutors,
            'companies' => $companies,
            'schoolYears' => $schoolYears,
            // Términos de búsqueda previos
            'old_search' => $search, // mostrar selección actual si la hay
            'old_role' => $role,
            'old_grade' => $grade,
            'old_company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = [
            'Academico' => config('roles.FACTILITADOR_ACADEMICO'),
            'Empresa' => config('roles.FACTILITADOR_EMPRESA'),
        ];

        // Devuelve la vista con el formulario
        return view('tutors.create', [
            'roles' => $roles,
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
            'role' => 'required|numeric|max:100',
            'pass' => 'required|string|min:4',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:16',
        ]);

        $person = new Person([
            'name'=> $request->post('name'),
            'surname'=> $request->post('surname'),
            'dni'=> $request->post('dni'),
            'email'=> $request->post('email'),
            'phone'=> $request->post('phone'),
            'role_id'=> $request->post('role'),
        ]);
        $person->save();

        $user = new User([
            'name' => $request->post('name') . $request->post('surname'),
            'person_id' => $person->id,
            'password' => Hash::make($request->post('pass')),
        ]);
        $user->save();

        return Redirect::route('tutors.edit', [$person->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Person $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $tutor)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'course' => 'nullable|numeric|not_in:0',
            'company' => 'nullable|numeric|not_in:0',
            'graduated' => 'nullable|numeric|not_in:0|max:1',
            'notactive' => 'nullable|numeric|not_in:0|max:1',
        ]);

        $students = Person::students()->isStudentOfTutor($tutor->id);
        $courses = Course::all();
        $companies = Company::all();

        // recoger el filtro del formulario buscador
        $search = $request->query('search');
        $course = $request->query('course');
        $company = $request->query('company');
        $graduated = (bool)$request->query('graduated');
        $notactive = (bool)$request->query('notactive');

        // Aplicar texto de busqueda
        if ($search) {
            $students->bySearchTerms($search);
        }

        if ($course) {
            $students->isStudentOfGrade($course);
        }

        if ($company) {
            $students->isStudentOfCompany($company);
        }

        if ($graduated) {
            $students->hasStudentDualSheetsGraduated();
        }

        $students->hasStudentDualSheetsGraduated(!$notactive);

        return view('tutors.show', [
            'tutor' => $tutor,
            'students' => $students->paginate(13),
            'courses' => $courses,
            'companies' => $companies,

            'old_search' => $search,
            'old_course' => $course,
            'old_company' => $company,
            'old_graduated' => $graduated,
            'old_notactive' => $notactive,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Person $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $tutor)
    {
        $roles = [
            'Academico' => config('roles.FACTILITADOR_ACADEMICO'),
            'Empresa' => config('roles.FACILITADOR_EMPRESA'),
        ];

        // Devuelve la vista con el formulario
        return view('tutors.edit', [
            'tutor' => $tutor,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Person $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $tutor)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'dni' => 'required|string|min:9|max:9',
            'role' => 'required|numeric|min:2|max:3',
            'pass' => 'nullable|string|min:4',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:16',
        ]);

        $tutor->name = $request->post('name');
        $tutor->surname = $request->post('surname');
        $tutor->dni = $request->post('dni');
        $tutor->role_id = (int)$request->post('role');
        $tutor->email = $request->post('email');
        $tutor->phone = $request->post('phone');

        if ($pass = $request->post('pass')) {
            $user = $tutor->user;
            $user->password = Hash::make($pass);
            $user->save();
        }

        $tutor->save();

        return Redirect::route('tutors.edit', ['tutor' => $tutor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Person $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $tutor)
    {
        Person::destroy($tutor->id);
        return Redirect::route('tutors.index');
    }
}
