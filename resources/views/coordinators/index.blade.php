@extends('layouts.app')

@section('title', 'Coordinadores')

@section('main')
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Coordinadores</h1>
        <a href="{{ route('coordinators.create') }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>

    <div>
        <form action="{{ route(Route::currentRouteName()) }}" method="GET">
            <input type="text" name="search" placeholder="Nombre, Apellido, DNI ..." value="{{ $old_search }}"/>
            <label>Es tutor: <input type="checkbox" name="is_tutor"></label>
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <div class="row">
        <div class="col-12 px-4">
            <div class="table-responsive">
                <table class="tablita-guapa table-striped table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>¿Es tutor?</th>
                            <th>Mail</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coordinators as $p)
                            <tr>
                                <td>{{ $p->dni }}</td>
                                <td>{{ $p->fullName() }}</td>
                                <td> ??????????????? </td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $coordinators->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection