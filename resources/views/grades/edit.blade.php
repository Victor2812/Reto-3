@extends('layouts.app')

@section('title', 'Nuevo Grado')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Grado Nuevo</h1>
    </div>

    <!-- Formulario creación -->
    <div class="row">
        <form action="{{ route('grades.update', [$grade->id]) }}" method="POST">
            @method('PUT')
            @csrf

            @error('name')
                <strong>{{ $message }}</strong>
            @enderror
            <div class="form-outine mb4">
                <input type="text" name="name" class="form-control form-control-md mb-4" placeholder="Nombre" value="{{ $grade->name }}">
            </div>

            @error('courses')
                <strong>{{ $message }}</strong>
            @enderror
            @foreach($courses as $c)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="courses[{{$c->id}}]" id="ck-course-{{$c->id}}" @checked($c->has_dual)>
                    <label class="form-check-label" for="ck-course-{{$c->id}}">
                        ¿El curso {{ $c->name }} tiene dual? {{$c->has_dual}}
                    </label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary mb-4 ">Actualizar grado</button>

        </form>
    </div>

    <!-- Button volver -->
    <div class="row">
        <a href="{{ route('grades.index') }}"><button class="btn btn-primary">Volver</button></a>
    </div>
@endsection