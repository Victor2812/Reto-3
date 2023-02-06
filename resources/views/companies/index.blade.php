@extends('layouts.app')

@section('title', 'Empresas')

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('companies.index') }}

    <!-- Titulo -->
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Empresas</h1>
        <a href="{{ route('companies.create') }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>
    <!-- End Titulo -->

    <!-- Filtros -->
        <div>
            <form action="" method="GET">
                <input type="text" name="search" placeholder="CIF, Dirección, Nombre..." value="{{ $old_search }}">
                <button type="submit">Buscar</button>
            </form>
        </div>
    <!-- End Filtros -->

    <!-- Row -->
    <div class="row">
        <div class="col-12 px-4">

            <!-- Tabla -->
            <div class="table-responsive">
                <table class="tablita-guapa table-striped table-bordered table-hovers" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CIF</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Tutor de Empresa</th>
                            <th>Contacto</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $c)
                            @php ($tutor = $c->person)
                            <tr>
                                <td>{{ $c->CIF }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->location }}</td>
                                <td><a href="{{ route('tutors.show', [$tutor->id]) }}">{{ $tutor->fullName() }}</a></td>
                                <td>{{ $tutor->email }} {{ $tutor->phone }}</td>

                                <!-- Ver -->
                                <td>
                                    <a href="{{ route('companies.show', [$c->id])}}" class="btn">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
    
                                <!-- Editar -->
                                <td> 
                                    <a class="btn" href="{{ route('companies.edit', [$c->id]) }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
    
                                <!-- Eliminar -->
                                <td>
                                    @include('partials.general.deletebutton', [
                                        'route' => route('companies.destroy', [$c->id])
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginacion -->
                <div>
                    {{ $companies->links() }}
                </div>
                <!-- End Paginacion -->

            </div>
            <!-- End Tabla -->

        </div>
    </div>
    <!-- End Row -->

@endsection
