@extends('layouts.app')

@section('title', 'Grados')

@section('main')
    <!-- Breadcrumbs -->
    {{  Breadcrumbs::render('grades.index') }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">
        <!-- Title -->
        <div class="row px-4 pt-4 gx-0 mb-4">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Grados</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtrosGrado">Filtros</a>
                    <a href="{{ route('grades.create') }}"><button class="btn btn-primary">Nuevo</button></a>
                </div>
            </div>
        </div>
        <!-- End title -->

        <!-- Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtrosGrado">
            <form action="{{ route(Route::currentRouteName()) }}" method="GET">
                <!-- Row -->
                <div class="row mb-0 mb-sm-3 gx-0">
                    <!-- Buscador -->
                    <div class="col-12 mb-3 col-sm-4 mb-sm-0 px-sm-1">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="gsearch" placeholder="Nombre" value="{{ $old_gsearch }}">
                        </div>
                    </div>

                    <!-- submit -->
                    <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1">
                        <button class="btn-guapo btn-primary" type="submit">Filtrar</button>
                    </div>
                </div>
                <!-- En Row -->
            </form>
        </div>
        <!-- End filtros -->

        <!-- Table -->
        <div class="row px-4 gx-0">

            <div class="table-responsive-sm">
                <table class="table table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="d-none d-sm-table-cell">Cursos</th>
                            <th class="d-none d-sm-table-cell">Editar</th>
                            <th class="d-none d-sm-table-cell">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $g)
                            <tr>
                                <td>{{ $g->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    @include('partials.grades.courselist', ['courses' => $g->courses()->get()])
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="btn" href="{{ route('grades.edit', [$g->id]) }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    @include('partials.general.deletebutton', [
                                        'route' => route('grades.destroy', [$g->id])
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
                <!-- Paginacion -->
                <div>
                    {{ $grades->links() }}
                </div>
                <!-- End Paginacion -->
            </div>
        </div>
        <!-- End Table -->

    </div>
    <!-- End Row -->
    
    <!-- Años escolares -->

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">Años escolares</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtrosYear">Filtros</a>
                    <a href="#"><button class="btn btn-primary">Nuevo</button></a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Buscador de años escolares -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtrosYear">
            <form action="{{ route(Route::currentRouteName()) }}" method="GET">

                <!-- Row -->
                <div class="row mb-0 mb-sm-3 gx-0">
                
                <!-- Year start -->
                <div class="col-12 mb-3 col-sm-4 wb-sm-0 px-sm-1">
                    <div class="form-outline">
                        <input type="number" class="form-control" name="ystart" placeholder="Desde" value="{{ $old_ystart }}" min="{{ $oldestYear->startYear() }}" max="{{ $newestYear->startYear() }}">
                    </div>
                </div>

                <!-- Year end -->
                <div>
                    <div>
                <input type="number" name="yend" placeholder="Hasta" value="{{ $old_yend }}" min="{{ $oldestYear->endYear() }}" max="{{ $newestYear->endYear() }}">

                <button type="submit"><i class="bi bi-search"></i></button>

                </div>
                <!-- End Row -->
            </form>
        </div>
        
        <!-- Tabla años escolares -->
        <div class="row">
            <div class="col-12 px-4">
                <table class="tablita-guapa table-striped table-bordered table-hovers" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Inicio</th>
                            <th>Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($years as $y)
                            <tr>
                                <td>{{ $y->startYear() }}</td>
                                <td>{{ $y->endYear() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
                <!-- Paginacion -->
                <div>
                    {{ $years->links() }}
                </div>
                <!-- End Paginacion -->
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection