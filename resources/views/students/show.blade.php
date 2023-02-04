@extends('layouts.app')

@section('title', "Alumno | $student->name $student->surname")

@section('main')

    <!-- Row -->
    <div class="row mb-4">
            <!-- Box -->
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">

                <!-- Titulo + Mail -->
                <div class="d-flex flex-column justify-content-start">
                    <h1 class="h3 mb-0">{{ $student->name }} {{ $student->surname }}</h1>
                    <p class="mb-0">{{ $student->email }}</p> 
                </div>
                
                <!-- Boton Editar -->
                <a href="#" class="d-inline-block btn btn-sm btn-secondary shadow-sm text-primary">
                    Editar <!-- TODO añadir enlace -->
                </a>

            </div>
            <!-- End Box -->
    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row mb-2">

        <!-- Ficha Dual-->
        <div class="d-flex flex-column justify-content-start">
            <h1 class="h3 mb-3">Ficha Dual</h1>
            <p><strong>Año Academico </strong> año academico</p> <!-- TODO añadir año -->
            <p><strong>Curso </strong> curso</p> <!-- TODO añadir curso -->
            <p><strong>Empresa </strong> empresa</p> <!-- TODO añadir empresa -->
            <p><strong>Tutor empresa </strong> tutor empresa</p> <!-- TODO tutor empresa -->
            <p><strong>Tutor Academico  </strong> tutor academico</p> <!-- TODO tutor academico -->
        </div>
        <!-- End Ficha Dual -->

    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row mb-0 mb-sm-4">

        <!-- Diario de Aprendizaje -->
        <div class="col-12 mb-4 col-sm-4 mb-sm-0">
            <a href="#" class="btn-guapo btn-primary">Diario de Aprendizaje</a> <!-- TODO añadir enlace -->
        </div>

        <!-- Diario de Seguimiento -->
        <div class="col-12 mb-4 col-sm-4 mb-sm-0">
            <a href="#" class="btn-guapo btn-primary">Diario de Seguimiento</a> <!-- TODO añadir enlace -->
        </div>

        <!-- Evaluación -->
        <div class="col-12 mb-4 col-sm-4 mb-sm-0">
            <a href="#" class="btn-guapo btn-primary">Evaluación</a> <!-- TODO añadir enlace -->
        </div>
    </div>
    <!-- End Row -->

    <a href="{{ route('students.index') }}">Volver</a>
@endsection