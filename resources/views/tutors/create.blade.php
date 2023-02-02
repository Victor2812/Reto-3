@extends('layouts.app')

@section('title', 'Tutor')

@section('main')

<div class="d-flex align-items-center justify-content-between mb-4 px-4">
    <h1 class="h3 mb-0">Añadir Tutor</h1>
</div>

<div class="row">
    <form action="{{ route('tutors.store') }}" class="requires-validation" novalidate>
        <div class="form-body">
            <div class="col-4">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Introduce nombre">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Introduce apellidos">
                </div>
            </div><div class="col-4">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Introduce número de teléfono">
                </div>
            </div>
        </div>
    </form>
</div>

<a href="{{ route('tutors.index')}}">Volver</a>

@endsection
