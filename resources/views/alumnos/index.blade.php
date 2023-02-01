@extends('layouts.app')

@section('title', 'Alumnos')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alumnos</h1>
        <a href="{{ route('dashboard') }}"><button class="btn btn-primary">Nuevo</button></a>
    </div>

    <!-- Buscador -->
    <div>
        <form action="{{ route(Route::currentRouteName()) }}" method="GET">
            <input type="text" name="search" placeholder="Nombre, Apellido, DNI ..." value="{{ $old_search }}" class=""/>
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <!-- Tabla alumnos -->
    <div class="row">
        <div class="col-12 ">
            <table class="tablita-guapa table table-stripped table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Mail</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $id)
                        <tr>
                            <th>{{ $id->dni }}</th>
                            <th>{{ $id->name }}</th>
                            <th>{{ $id->surname }}</th>
                            <th>{{ $id->email }}</th>
                            <th>{{ $id->phone }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $alumnos->links() }}
            </div>
        </div>
    </div>
@endsection