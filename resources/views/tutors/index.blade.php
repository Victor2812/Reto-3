@extends('layouts.app')

@section('title', 'Tutores')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('tutors.index') }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Tutores</h1>
                <div>
                    <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#filtros">Filtros</a>
                    <a href="{{ route('tutors.create') }}"><button class="btn btn-primary">Nuevo</button></a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- TODO Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">

            <form action="{{ route(Route::currentRouteName()) }}" method="GET">

                <!-- Row -->
                <div class="row mb-1 mb-sm-3 gx-0">

                    <!-- Buscador --> <!-- TODO revisar que funcione -->
                    <div class="d-inline-block d-md-none form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Buscar..." value="{{ $old_search }}"/>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Row -->
            
                <!-- Row -->
                <div class="row mb-0 mb-sm-3 gx-0">

                    <!-- Tipo de Tutor -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select name="role" class="form-select">
                                <option value="" selected>Tipo de Tutor</option>
                                @foreach ($roles as $r)
                                <option value="{{ $r->id }}" @selected($r->id == $old_role)>
                                    {{ $r->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Grados -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select name="grade" class="form-select">
                                <option value="" selected>Grado</option>
                                @foreach ($grades as $g)
                                <option value="{{ $g->id }}"  @selected($g->id == $old_grade)>
                                    {{ $g->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Empresas -->
                    <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                        <div class="form-group">
                            <select name="company" class="form-select">
                                <option value="" selected>Empresa</option>
                                @foreach ($companies as $c)
                                <option value="{{ $c->id }}"  @selected($c->id == $old_company)>
                                    {{ $c->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
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
                            <th class="d-none d-sm-table-cell">Tipo</th>
                            <th class="d-none d-sm-table-cell">Mail</th>
                            <th class="d-none d-sm-table-cell">Telefono</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($tutors as $t)
                        <tr>
                            <td class="d-none d-sm-table-cell">{{ $t->dni }}</td>
                            <td>{{ $t->fullName() }}</td>
                            <td class="d-none d-sm-table-cell">{{ $t->role()->first()->name }}</td>
                            <td class="d-none d-sm-table-cell">{{ $t->email }}</td>
                            <td class="d-none d-sm-table-cell">{{ $t->phone }}</td>

                            <!-- Ver -->
                            <td>
                                <a href="{{ route('tutors.show', [$t->id])}}">
                                    <button class="btn">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                            </td>

                            <!-- Editar -->
                            <td> 
                                <a href="{{ route('tutors.edit', [$t->id]) }}">
                                    <button class="btn">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </a>
                            </td>

                            <!-- Eliminar -->
                            <td>
                                <a href="{{ route('tutors.destroy', [$t->id]) }}">
                                    <button class="btn"> 
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                

                <!-- Paginacion -->
                <div>
                    {{ $tutors->links() }}
                </div>

            
        </div>
        <!-- End Table -->

    </div>
    <!-- End Row -->

@endsection
