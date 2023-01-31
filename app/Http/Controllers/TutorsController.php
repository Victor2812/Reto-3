<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorsController extends Controller
{
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
            $search_terms = explode(' ', trim($search));
            $search_terms = array_filter($search_terms, function ($param) {
                return strlen($param) > 0;
            });

            $tutors->where(function (Builder $query) use ($search_terms) {
                foreach ($search_terms as $term) {
                    $query->orWhere(DB::raw("LOWER(name)"), 'like', "%$term%")
                        ->orWhere(DB::raw("LOWER(surname)"), 'like', "%$term%")
                        ->orWhere(DB::raw("LOWER(dni)"), 'like', "%$term%");
                }
            });
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

        // Devuelve la lista de tutores
        return view('tutors.index', [
            // Información de la base de datos
            'tutors' => $tutors->get(),
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
        // Devuelve la vista con el formulario
        return view('tutors.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
