@extends('layouts.app')

@section('title', 'Coordinadores')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('coordinators.index') }}

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

            <!-- Buscador -->
            <input type="text" name="search" placeholder="Nombre, Apellido, DNI ..." value="{{ $old_search }}"/>
            <button type="submit"><i class="bi bi-search"></i></button>

            <!-- Es tutor -->
            <label>Es tutor: <input type="checkbox" name="is_tutor"></label>
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
                                <td>{{ $p->dni }}</td> 
                                <td>{{ $p->name }} {{ $p->surname }}<td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->phone }}</td>
                                <td><a href="{{ route('coordinators.show', [$p])}}">Ver</a></td>
                                <td><a href="#">Editar</a></td> <!-- TODO enlace -->
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
