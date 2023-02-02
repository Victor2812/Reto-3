@extends('layouts.app')

@section('title', 'Grados')

@section('main')
    <!-- Años escolares -->
    <section>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Años escolares</h1>
            <a href="#"><button class="btn btn-primary">Nuevo</button></a>
        </div>

        <!-- Buscador de años escolares -->
        <div class="row">
            <form action="{{ route(Route::currentRouteName()) }}" method="GET">
                <input type="number" name="ystart" placeholder="Desde" value="{{ $old_ystart }}" min="{{ $oldestYear->startYear() }}" max="{{ $newestYear->startYear() }}">
                <input type="number" name="yend" placeholder="Hasta" value="{{ $old_yend }}" min="{{ $oldestYear->endYear() }}" max="{{ $newestYear->endYear() }}">

                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        
        <!-- Tabla años escolares -->
        <div class="row">
            <div class="col-12 px-4">
                <table class="tablita-guapa" width="100%" cellspacing="0">
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
    </section>

    <section>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Grados</h1>
            <a href="#"><button class="btn btn-primary">Nuevo</button></a>
        </div>
        
        <div class="row">
            <form action="{{ route(Route::currentRouteName()) }}" method="GET">
                <input type="text" name="gsearch" placeholder="Nombre" value="{{ $old_gsearch }}">

                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <div class="row">
            <div class="col-12 px-4">
                <table class="tablita-guapa" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cursos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $g)
                            <tr>
                                <td>{{ $g->name }}</td>
                                <td>
                                    @include('partials.grades.courselist', ['courses' => $g->courses()->get()])
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
    </section>
@endsection