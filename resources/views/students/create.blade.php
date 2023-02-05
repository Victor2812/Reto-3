@extends('layouts.app')

@section('title', 'Nuevo Alumno')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('students.create') }}

<!-- Titulo -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Añadir Alumno</h1>
</div>
<!-- End Titulo -->

<div class="row">

    <!-- Formulario -->
    <form action="{{ route('students.store') }}" class="requires-validation" method="POST">
        @csrf
        <div class="form-body">

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Nombre -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('cif')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                    </div>
                </div>

                <!-- DNI -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="dni" placeholder="DNI">
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Grado -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="grado">
                            <option value="" selected>Grado</option> <!-- TODO cargar grados -->
                        </select>
                    </div>
                </div>

                <!-- Curso -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="curso">
                            <option value="" selected>Curso</option> <!-- TODO cargar cursos -->
                        </select>
                    </div>
                </div>

                <!-- Año Academico -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="anio-academico">
                            <option value="" selected>Año academico</option> <!-- TODO cargar curso academico -->
                        </select>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Tutor Academico -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="tutor-academico">
                            <option value="" selected>Tutor Académico</option> <!-- TODO cargar tutor academico -->
                        </select>
                    </div>
                </div>
                
                <!-- Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="empresa">
                            <option value="" selected>Empresa</option> <!-- TODO cargar empresa -->
                        </select>
                    </div>
                </div>

                <!-- Tutor Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="tutor-empresa">
                            <option value="" selected>Tutor Empresa</option> <!-- TODO cargar empresa -->
                        </select>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Mail -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('cif')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="email" class="form-control" name="mail" placeholder="Mail">
                    </div>
                </div>

                <!-- Password -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
                    </div>
                </div>

                <!-- Telefono -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
                    </div>
                </div>


            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Añadir Alumno</button>
                </div>

            </div>
            <!-- End Row -->

        </div>
    </form>
    <!-- End Formulario -->

</div>

<a href="{{ route('students.index')}}">Volver</a>

@endsection