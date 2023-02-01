@extends('layouts.app')

@section('title', 'Tutores')

@section('main')
    <div class="d-flex align-items-center justify-content-between mb-4 px-4">
        <h1 class="h3 mb-0">Tutores</h1>
        <a href="{{ route('tutors.create') }}" class="d-inline-block btn btn-sm btn-primary shadow-sm">
            Nuevo
        </a>
    </div>

    <div class="row">
        <div class="col-12 px-4">
            <div class="table-responsive">
                <table class="tablita-guapa table-striped table-bordered table-hover" width="100%" cellspacing="0">
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
                <div>
                    {{ $tutors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
