<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
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
        // recoger lisado de alumno de la database
        $students = Person::students();

        // recoger el filtro del formulario buscador
        $search = $request->query('search');

        // Aplicar texto de busqueda
        if ($search) {
            $students->bySearchTerms($search);
        }

        return view('students.index', [
            // info de la DB
            'students' => $students->paginate(13),
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
        return view('students.show', [
            'student' => $student,
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
        

        return view('students.edit', [
            'student' => $student,
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
            'nombre' => 'required|string|min:4',
            'apellidos' => 'required|string@min|min:5'
            
        ]);



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
        $student->delete();
        return Redirect::route('students.index');
    }
}
