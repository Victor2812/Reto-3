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

        <!-- Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">
            <form action="" method="GET">
                <!-- Row -->
                <div class="row mb-0 mb-sm-3 gx-0">

                    <!-- Buscador -->
                    <div class="col-12 mb-3 col-sm-4 mb-sm-0 px-sm-1">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="search" placeholder="Nombre, DNI..." value="{{ $old_search }}"/>
                        </div>
                    </div>

                    <!-- Es Tutor -->
                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1 d-flex justify-content-center align-items-center">
                        <div class="form-check d-flex justify-content-center align-items-center">
                            <input class="form-check-input" type="checkbox" value="1" name="is_tutor" id="es-tutor" @checked($old_istutor)>
                            <label class="form-check-label px-2 mt-1" for="es-tutor">
                                Tutor
                            </label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 mb-3 col-sm-1 mb-sm-0 px-sm-1">
                            <button class="btn-guapo btn-primary" type="submit">Filtrar</button>
                    </div>

                </div>
                <!-- End Row -->
            </form>
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
                                <a href="{{ route('coordinators.show', [$p->id])}}" class="btn">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>

                            <!-- Editar -->
                            <td> 
                                <a class="btn" href="{{ route('coordinators.edit', [$p->id]) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>

                            <!-- Eliminar -->
                            <td>
                                @include('partials.general.deletebutton', [
                                    'route' => route('coordinators.destroy', [$p->id])
                                ])
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
