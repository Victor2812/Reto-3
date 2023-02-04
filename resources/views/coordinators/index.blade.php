@extends('layouts.app')

@section('title', 'Coordinadores')

@section('main')

    <!-- Titulo -->
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Coordinadores</h1>
        <a href="{{ route('coordinators.create') }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>
    <!-- End Titulo -->

    <!-- Filtros -->
    <div>
        <form action="{{ route(Route::currentRouteName()) }}" method="GET">
            <input type="text" name="search" placeholder="Nombre, Apellido, DNI ..." value="{{ $old_search }}"/>
            <label>Es tutor: <input type="checkbox" name="is_tutor"></label>
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <!-- End Filtros -->

    <!-- Row -->
    <div class="row">
        <div class="col-12 px-4">

            <!-- Table -->
            <div class="table-responsive">
                <table class="tablita-guapa table-striped table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Mail</th>
                            <th>Telefono</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coordinators as $p)
                            <tr>
                                <td></td> <!-- TODO dni-->
                                <td></td> <!-- TODO nombre-->
                                <td></td> <!-- TODO mail-->
                                <td></td> <!-- TODO telefono-->
                                <td><a href="#">-->Ver</a></td> <!-- TODO enlace -->
                                <td><a href="#"></a></td> <!-- TODO enlace -->
                                <td><button>Eliminar</button></td> <!-- TODO enlace -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginacion -->
                <div>
                    {{ $coordinators->links() }}
                </div>
                <!-- End Paginacion -->

            </div>
            <!-- End Table -->
        </div>
    </div>
    <!-- End Row -->
@endsection
