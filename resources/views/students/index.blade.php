@extends('layouts.app')

@section('title', 'Alumnos')

@section('main')

    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alumnos</h1>
        <a href="{{ route('students.create') }}"><button class="btn btn-primary">Nuevo</button></a>
    </div>
    <!-- End Titulo -->

    <!-- Filtros -->

        <!-- Buscador --> <!-- TODO revisar que funcione -->
        <div>
            <form action="{{ route(Route::currentRouteName()) }}" method="GET">
                <input type="text" name="search" placeholder="Nombre, Apellido, DNI ..." value="{{ $old_search }}" class=""/>
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <!-- Curso -->

        <!-- Grado -->

        <!-- Tutor -->

        <!-- Empresa -->

        <!-- Titulados checkbox -->

        <!-- Activos checkbox seleccionado por default -->

    <!-- End Filtros -->

    <div class="row">
        <div class="col-12 px-4">

            <!-- Table -->
            <div class="table-responsive">
                <table class="tablita-guapa table-striped table-bordered table-hovers" width="100%" cellspacing="0">
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
                    @foreach ($students as $id)
                        <tr>
                            <th>{{ $id->dni }}</th>
                            <th>{{ $id->name }} {{ $id->surname }}</th>
                            <th>{{ $id->email }}</th>
                            <th>{{ $id->phone }}</th>
                            <td><a href="{{ route('students.show', [$id->id])}}">Ver</a></td> <!-- TODO enlace --> 
                            <td><a href="#">Editar</a></td> <!-- TODO enlace -->
                            <td><button>Eliminar</button></td> <!-- TODO enlace -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Paginacion -->
                <div>
                    {{ $students->links() }}
                </div>
                <!-- End Paginacion -->

            </div>
            <!-- End Table -->

        </div>
    </div>
    <!-- End Row -->

@endsection