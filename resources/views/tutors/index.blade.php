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

        <!-- Filtros -->
        <div class="row px-4 gx-sm-3 gx-0 collapse" id="filtros">

            <form action="{{ route(Route::currentRouteName()) }}" method="GET">
            
                <!-- Row -->
                <div class="row mb-0 mb-sm-3 gx-0">

                    <!-- Buscador -->
                    <div class="col-12 mb-3 col-sm-4 mb-sm-0 px-sm-1">
                        <div class="form-outline">
                            <input type="text" class="form-control" name="search" placeholder="Nombre, DNI..." value="{{ $old_search }}"/>
                        </div>
                    </div>

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
                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
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
                    <div class="col-12 mb-3 col-sm-2 mb-sm-0 px-sm-1">
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
                <table class="table table-hover" width="100%" cellspacing="0">
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
                                <a href="{{ route('tutors.show', [$t->id])}}" class="btn">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>

                            <!-- Editar -->
                            <td> 
                                <a class="btn" href="{{ route('tutors.edit', [$t->id]) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>

                            <!-- Eliminar -->
                            <td>
                                @include('partials.general.deletebutton', [
                                    'route' => route('tutors.destroy', [$t->id])
                                ])
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
