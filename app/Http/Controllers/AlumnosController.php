<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // recoger lisado de alumno de la database
        $alumnos = Person::students();

        // recoger el filtro del formulario buscador
        $search = $request->query('search');

        // Aplicar texto de busqueda
        if ($search) {
            $search_terms = explode(' ', trim($search));
            $search_terms = array_filter($search_terms, function ($param) {
                return strlen($param) > 0;
            });

            $alumnos->where(function (Builder $query) use ($search_terms) {
                foreach ($search_terms as $term) {
                    $term = strtolower($term);
                    $query->orWhere(DB::raw("LOWER(name)"), 'like', "%$term%")
                        ->orWhere(DB::raw("LOWER(surname)"), 'like', "%$term%")
                        ->orWhere(DB::raw("LOWER(dni)"), 'like', "%$term%");
                }
            });
        }

        return view('alumnos.index', [
            // info de la DB
            'alumnos' => $alumnos->paginate(13),

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
