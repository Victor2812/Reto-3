@extends('layouts.app')

@section('title', 'Nuevo Grado')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grado Nuevo</h1>
    </div>

    <!-- Formulario creación -->
    <div class="row">
        <form action="{{ route('grades.store') }}" method="POST">
            @csrf

            @error('name')
                <strong>{{ $message }}</strong>
            @enderror
            <div class="form-outine mb4">
                <input type="text" name="name" class="form-control form-control-md mb-4" placeholder="Nombre">
            </div>

            @error('courses')
                <strong>{{ $message }}</strong>
            @enderror
            @for ($i = 0; $i < $nCourses; $i++)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="courses[{{$i}}]" id="ck-course-{{$i}}" @checked($i>0)>
                    <label class="form-check-label" for="ck-course-{{$i}}">
                        ¿El curso {{ $i + 1}} tiene dual?
                    </label>
                </div>
            @endfor

            <button type="submit" class="btn btn-primary mb-4 ">Añadir Grado</button>

        </form>
    </div>

    <!-- Button volver -->
    <div class="row">
        <a href="{{ route('grades.index') }}"><button class="btn btn-primary">Volver</button></a>
    </div>
@endsection
