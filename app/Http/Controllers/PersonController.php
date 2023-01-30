<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
    * Create the controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // Establecer la política de autorización al recurso
        $this->authorizeResource(Person::class, 'person');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mostrar lista de personas
        return 'Lista de personas';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar formulario de crear personas
        return 'Formulario para crear una nueva persona';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Acción del formulario de crear personas
    }

    /**
     * Display the specified resource.
     *
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $person)
    {
        // Mostrar la persona
        return 'Mostrar una persona';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        // Editar la persona
        return 'Formulario para editar una persona';
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
        // Actualizar la persona
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        // Destruir la persona
    }
}
