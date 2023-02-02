@extends('layouts.app')

@section('title', 'Grados')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grados</h1>
        <a href="{{ route('grades.create') }}"><button class="btn btn-primary">Nuevo</button></a>
    </div>
    
    <!-- Tabla alumnos -->
    <div class="row">
        <div class="col-12 px-4">
            <table class="tablita-guapa" width="100%" cellspacing="0">
                <tbody>
                    @foreach ($data as $grade)
                        <tr>
                            <th>{{ $grade->name }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="content" id="app">
        <error-component></error-component>
    </div>

@endsection