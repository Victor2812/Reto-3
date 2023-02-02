@extends('layouts.app')

@section('title', 'Nuevo Alumno')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grado Nuevo</h1>
    </div>

    <!-- Formulario creación -->
    <div class="row">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-outine mb4">
                <input type="text" name="nombre" class="form-control form-control-md mb-4" placeholder="Nombre">
            </div>
            @error('nombre')
                <strong>Te dejaste el nombre por poner PELOTUDO</strong>
            @enderror
            <button type="submit" class="btn btn-primary mb-4 ">Añadir Grado</button>

        </form>
    </div>

    <!-- Button volver -->
    <div class="row">
        <a href="{{ route('grades.index') }}"><button class="btn btn-primary">Volver</button></a>
    </div>
@endsection