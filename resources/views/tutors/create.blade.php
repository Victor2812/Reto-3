@extends('layouts.app')

@section('title', 'Tutor')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('tutors.create') }}

<div class="d-flex align-items-center justify-content-between mb-4 px-4">
    <h1 class="h3 mb-0">Añadir Tutor</h1>
</div>

<div class="row">
    <form action="{{ route('tutors.store') }}" class="requires-validation" novalidate>
        <div class="form-body">

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Nombre -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                    </div>
                </div>

                <!-- DNI -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="dni" placeholder="DNI">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Tipo de Tutor -->
                <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="tipoTutor">
                            <option selected>Tipo de tutor</option>
                            @foreach ($roles as $key => $value)
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Grado -->
                <div class="col-12 mb-4 col-sm-6 mb-sm-0">
                    <div class="form-group">

                        <select class="form-select" name="grado">
                            <option selected>Grado</option>
                            @foreach ($grades as $g)
                                <option value="{{ $g->id }}">{{ $g->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Mail -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-outline">
                        <input type="mail" class="form-control" name="email" placeholder="Mail">
                    </div>
                </div>

                <!-- Password -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-outline">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                    </div>
                </div>

                <!-- Teléfono -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-outline">
                        <input type="text" class="form-control" name="pass" placeholder="Teléfono">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Añadir Tutor</button>
                </div>

            </div>
            <!-- End Row -->

        </div>
    </form>
</div>

<a href="{{ route('tutors.index')}}">Volver</a>

@endsection
