@extends('layouts.app')

@section('title', 'Tutores')

@section('main')
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Tutores</h1>
        <a href="{{ route('tutors.create') }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>

    <div>
        <form action="{{ route(Route::currentRouteName()) }}" method="GET">
            <input type="text" name="search" placeholder="Nombre, Apellido, DNI ..." value="{{ $old_search }}"/>
            <select name="role">
                <option value="">-- Cualquiera --</option>
                @foreach ($roles as $r)
                    <option value="{{ $r->id }}" @selected($r->id == $old_role)>
                        {{ $r->name }}
                    </option>
                @endforeach
            </select>
            <select name="grade">
                <option value="">-- Cualquiera --</option>
                @foreach ($grades as $g)
                    <option value="{{ $g->id }}"  @selected($g->id == $old_grade)>
                        {{ $g->name }}
                    </option>
                @endforeach
            </select>
            <select name="company">
                <option value="">-- Cualquiera --</option>
                @foreach ($companies as $c)
                <option value="{{ $c->id }}"  @selected($c->id == $old_company)>
                    {{ $c->name }}
                </option>
                @endforeach
            </select>
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <div class="row">
        <div class="col-12 px-4">
            <div class="table-responsive">
                <table class="tablita-guapa" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Mail</th>
                            <th>Telefono</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
