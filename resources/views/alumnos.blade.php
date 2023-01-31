@extends('pruebas')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alumnos</h1>
        <a href="#"><i class="bi bi-person-plus"></i></a>
    </div>

    <!-- Tabla alumnos -->
    <div class="table-wrapper-scroll-y custom-scrollbar">
        <table class="table table-bordered table-striped mb-0">
            @foreach ($data as $person)
                <tr>
                    <th>{{ $person->fullName() }}</th>
                </tr>
            @endforeach
        </table>
    </div>


@endsection