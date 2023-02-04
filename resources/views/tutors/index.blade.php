@extends('layouts.app')

@section('title', 'Tutores')

@section('main')

    <!-- Titulo -->
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Tutores</h1>
        <a href="{{ route('tutors.create') }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>
    <!-- End Titulo -->

    <!-- Filtros -->
    <div>
        <form action="{{ route(Route::currentRouteName()) }}" method="GET">

            <!-- Barra Busqueda -->
            <input type="text" name="search" placeholder="Nombre, Apellido, DNI ..." value="{{ $old_search }}"/>

            <!-- Tipo de Tutor -->
            <select name="role">
                <option value="">-- Cualquiera --</option>
                @foreach ($roles as $r)
                    <option value="{{ $r->id }}" @selected($r->id == $old_role)>
                        {{ $r->name }}
                    </option>
                @endforeach
            </select>

            <!-- Grados -->
            <select name="grade">
                <option value="">-- Cualquiera --</option>
                @foreach ($grades as $g)
                    <option value="{{ $g->id }}"  @selected($g->id == $old_grade)>
                        {{ $g->name }}
                    </option>
                @endforeach
            </select>

            <!-- Empresa -->
            <select name="company">
                <option value="">-- Cualquiera --</option>
                @foreach ($companies as $c)
                <option value="{{ $c->id }}"  @selected($c->id == $old_company)>
                    {{ $c->name }}
                </option>
                @endforeach
            </select>

            <!-- Submit -->
            <button type="submit"><i class="bi bi-search"></i></button>

        </form>
    </div>
    <!-- End Filtros -->

    <!-- Row -->
    <div class="row">
        <div class="col-12 px-4">

            <!-- Table -->
            <div class="table-responsive">
                <table class="tablita-guapa table-striped table-bordered table-hovers" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Mail</th>
                            <th>Telefono</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutors as $t)
                            <tr>
                                <td>{{ $t->dni }}</td>
                                <td>{{ $t->fullName() }}</td>
                                <td>{{ $t->role()->first()->name }}</td>
                                <td>{{ $t->email }}</td>
                                <td>{{ $t->phone }}</td>
                                <td><a href="{{ route('tutors.show', [$t])}}">-->Ver</a></td> <!-- TODO enlace -->
                                <td><a href="#">Editar</a></td> <!-- TODO enlace -->
                                <td><button>Eliminar</button></td> <!-- TODO enlace -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginacion -->
                <div>
                    {{ $tutors->links() }}
                </div>
                <!-- End Paginacion -->

            </div>
            <!-- End Table -->

        </div>
    </div>
    <!-- End Row -->

@endsection
