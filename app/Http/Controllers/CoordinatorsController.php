<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class CoordinatorsController extends Controller
{
    /**
    * Create the controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // Establecer la política de autorización al recurso
        // $this->authorizeResource(Person::class, 'person');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Información de la base de datos
        $coordinators = Person::coordinators();

        // Obtener filtros
        $search = $request->query('search');
        $is_tutor = $request->query('is_tutor') === 'on';

        if ($search) {
            $coordinators->bySearchTerms($search);
        }

        if ($is_tutor) {
            $coordinators->isTutorOnDualSheets();
        }

        return view('coordinators.index', [
            // Información de la base de datos
            'coordinators' => $coordinators->paginate(13),
            // Términos de búsqueda previos
            'old_search' => $search, // mostrar selección actual si la hay
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
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $coordinator)
    {
        return view('coordinators.show', [
            'coordinator' => $coordinator,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
