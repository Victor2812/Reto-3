@extends('layouts.app')

@section('title', 'Alumnos')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('students.index') }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Alumnos</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                    <a href="{{ route('students.create') }}"><button class="btn btn-primary">Nuevo</button></a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- TODO Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">

            <!-- Row -->
            <div class="row mb-1 mb-sm-3 gx-0">

                <!-- Buscador --> <!-- TODO revisar que funcione -->
                <form action="{{ route(Route::currentRouteName()) }}" method="GET" 
                    class="d-inline-block d-md-none form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Buscar...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- End Row -->
            
            <!-- Row -->
            <div class="row mb-0 mb-sm-3 gx-0">

                <!-- Grado -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <div class="form-group">
                        <select class="form-select" name="grado">
                            <option value="" selected>Grado</option> <!-- TODO cargar grados -->
                        </select>
                    </div> 
                </div>

                <!-- Tutor Academico -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select class="form-select" name="tutor-academico">
                                <option value="" selected>Tutor Académico</option> <!-- TODO cargar tutor academico -->
                            </select>
                        </div>
                </div>

                <!-- Empresa -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <div class="form-group">
                        <select class="form-select" name="empresa">
                            <option value="" selected>Empresa</option> <!-- TODO cargar empresa -->
                        </select>
                    </div>
                </div>

                <!-- Tutor Empresa -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <div class="form-group">
                        <select class="form-select" name="tutor-empresa">
                            <option value="" selected>Tutor Empresa</option> <!-- TODO cargar empresa -->
                        </select>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-3 gx-0">

                <!-- Curso -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <div class="form-group">
                        <select class="form-select" name="curso">
                            <option value="" selected>Curso</option> <!-- TODO cargar cursos -->
                        </select>
                    </div>
                </div>

                <!-- Año Academico -->
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <div class="form-group">
                        <select class="form-select" name="anio-academico">
                            <option value="" selected>Año academico</option> <!-- TODO cargar curso academico -->
                        </select>
                    </div>
                </div>

                <!-- Checkboxes -->
                <div class="col-12 mb-3 col-sm-6 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">

                    <!-- Titulados -->
                    <div class="form-check d-flex justify-content-center align-items-center">
                        <input class="form-check-input" type="checkbox" value="" name="titulados">
                        <label class="form-check-label px-2 mt-1" for="titulados">
                            Titulados
                        </label>
                    </div>

                    <!-- No Activos -->
                    <div class="form-check d-flex justify-content-center align-items-center">
                        <input class="form-check-input" type="checkbox" value="" name="no-activos">
                        <label class="form-check-label px-2 mt-1" for="no-activos">
                            No Activos
                        </label>
                    </div>

                </div>
                <!-- End Checkboxes -->
            </div>
            <!-- End Row -->

        </div>
        <!-- End Filtros -->

        <!-- Table -->
        <div class="row px-4 gx-0">
            
            <div class="table-responsive-sm">
                <table class="table table-hover border-secodary" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">DNI</th>
                            <th>Nombre</th>
                            <th class="d-none d-sm-table-cell">Mail</th>
                            <th class="d-none d-sm-table-cell">Telefono</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $id)
                        <tr>
                            <td class="d-none d-sm-table-cell">{{ $id->dni }}</td>
                            <td>{{ $id->name }} {{ $id->surname }}</td>
                            <td class="d-none d-sm-table-cell">{{ $id->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ $id->phone }}</td>

                            <!-- Ver -->
                            <td>
                                <button class="btn" href="{{ route('students.show', [$id->id])}}">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>

                            <!-- Editar -->
                            <td> 
                                <button class="btn" href="#"><!-- TODO enlace -->
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>

                            <!-- Eliminar -->
                            <td>
                                <button class="btn"> <!-- TODO enlace -->
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                

                <!-- Paginacion -->
                <div>
                    {{ $students->links() }}
                </div>

            
        </div>
        <!-- End Table -->




    </div>
    <!-- End Row -->
    

    

    

    <!-- Row -->
    <div class="row">
        <div class="col-12 px-4">

            

        </div>
    </div>
    <!-- End Row -->

@endsection