@extends('layouts.app')

@section('title', 'Coordinadores')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('coordinators.index') }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Coordinadores</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                    <a href="{{ route('coordinators.create') }}"><button class="btn btn-primary">Nuevo</button></a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- TODO Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">

            <!-- Row -->
            <div class="row mb-1 mb-sm-3 gx-0">

                <!-- Buscador --> <!-- TODO meter action -->
                <form action="#" method="GET" 
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

                <div class="col-12 mb-3 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">

                    <!-- Es Tutor -->
                    <div class="form-check d-flex justify-content-center align-items-center">
                        <input class="form-check-input" type="checkbox" value="" name="es-tutor">
                        <label class="form-check-label px-2 mt-1" for="es-tutor">
                            Tutor
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
                    @foreach ($coordinators as $p)
                        <tr>
                            <td class="d-none d-sm-table-cell">{{ $p->dni }}</td>
                            <td>{{ $p->fullName() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $p->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ $p->phone }}</td>

                            <!-- Ver -->
                            <td>
                                <a href="{{ route('coordinators.show', [$p->id])}}">
                                    <button class="btn">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </a>
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
                    {{ $coordinators->links() }}
                </div>

            
        </div>
        <!-- End Table -->

    </div>
    <!-- End Row -->

@endsection
