@extends('layouts.app')

@section('title', 'Editar Alumno')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('students.edit', $student) }}

<div class="row bg-white shadow mx-2 gx-0">

     <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <h1 class="h3 mb-0">Añadir Alumno</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Formulario -->
    <div class="row px-4 gx-sm-3 gx-0">
        <form action="{{ route('students.update', [$student->id]) }}" class="requires-validation" method="POST">
            @csrf
            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Nombre -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('cif')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ $student->name }}">
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="{{ $student->surname }}">
                    </div>
                </div>

                <!-- DNI -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    @error('name')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <div class="form-outline">
                        <input type="text" class="form-control" name="dni" placeholder="DNI" value="{{ $student->dni }}">
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
                        <input type="email" class="form-control" name="mail" placeholder="Mail" value="{{ $student->email }}">
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
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="{{ $student->phone }}">
                    </div>
                </div>


            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Editar Alumno</button>
                </div>

            </div>
            <!-- End Row -->
        </form>
    </div>
    <!-- End Formulario -->

</div>
@endsection