@extends('pruebas')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alumnos</h1>
        <a href="#"><button class="btn btn-primary">Nuevo</button></a>
    </div>

    <!-- Tabla alumnos -->
    <div class="row">
        <div class="col-12 px-4">
            <div class="table-responsive custom-scrollbar">
                <table class="tablita-guapa" width="100%" cellspacing="0">
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
                        @foreach ($data as $grade)
                            <tr>
                                <th>{{ $grade->dni }}</th>
                                <th>{{ $grade->name }}</th>
                                <th>{{ $grade->surname }}</th>
                                <th>{{ $grade->email }}</th>
                                <th>{{ $grade->phone }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection