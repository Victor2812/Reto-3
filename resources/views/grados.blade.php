@extends('pruebas')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grados</h1>
        <a href="{{ route('newGrado') }}"><button class="btn btn-primary">Nuevo</button></a>
    </div>

    <!-- Tabla alumnos -->
    <div class="table-wrapper-scroll-y custom-scrollbar">
        <table class="table table-bordered table-striped mb-0">
            @foreach ($data as $grade)
                <tr>
                    <th>{{ $grade->name }}</th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection