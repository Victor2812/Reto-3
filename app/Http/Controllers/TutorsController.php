<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Http\Request;

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
        // Información de la base de datos
        $tutors = Person::allTutors();
        $roles = Role::all();
        // TODO: grados
        // TODO: compañías

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
            'companies' => [],
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
        $grades = Grade::all();
        $roles = [
            'Academico' => config('roles.FACTILITADOR_ACADEMICO'),
            'Empresa' => config('roles.FACTILITADOR_EMPRESA'),
        ];

        // Devuelve la vista con el formulario
        return view('tutors.create', [
            'grades' => $grades,
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
        $request->validate([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Person $tutor)
    {
        return view('tutors.show', [
            'tutor' => $tutor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
