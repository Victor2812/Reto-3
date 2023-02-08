<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

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
        $this->authorizeResource(Person::class, 'coordinator');
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
        $is_tutor = $request->query('is_tutor') === '1';

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
            'old_search' => $search,
            'old_istutor' => $is_tutor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinators.create');
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
            'nombre' => 'required|string|min:3',
            'apellidos' => 'required|string|min:4',
            'dni' => 'required|string|min:9|max:9',
            'email' => 'required|string|',
            'phone' => 'required|integer|min:9',
            'pass' => 'required|string|min:4',
        ]);

        $coordinator = new Person([
            'name' => $request->nombre,
            'surname' => $request->apellidos,
            'dni' => $request->dni,
            'phone' => $request->phone,
            'email' => $request->email,
            'role_id' => 1,
        ]);

        $coordinator->save();
        //dd($coordinator);
        $pass = Hash::make($request->pass);
        //$new_coor = Person::where('dni', '=', $request->dni)->get()->first();
        $user = new User([
            'name' => $request->nombre,
            'person_id' => $coordinator->id,
            'password' => $pass,
        ]);
        
        $user->save();

        return Redirect::route('coordinators.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Person $coordinator
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
     * @param  Person $coordinator
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $coordinator)
    {
        return view("coordinators.edit", [
            'coordinator' => $coordinator
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Person $coordinator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $coordinator)
    {   
        //dd($coordinator);
        $request->validate([
            'nombre' => 'required|string|min:3',
            'apellidos' => 'required|string|min:4',
            'dni' => 'required|string|min:9|max:9',
            'email' => 'required|string|',
            'phone' => 'min:9',
            'pass' => 'min:0',
        ]);

        $coordinator->name = $request->nombre;
        $coordinator->surname = $request->apellidos;
        $coordinator->dni = $request->dni;
        $coordinator->email = $request->email;
        $coordinator->phone = $request->phone;

        $coordinator->save();

        if ($pass = $request->post('pass')) {
            $user = $coordinator->user;
            $user->password = Hash::make($pass);
            $user->save();
        }

        return Redirect::route('coordinators.edit', [$coordinator->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Person $coordinator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $coordinator)
    {
        Person::destroy($coordinator->id);
        return Redirect::route('coordinators.index');
    }
}
