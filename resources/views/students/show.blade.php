@extends('layouts.app')

@section('title', "Alumno | $student->name")

@section('main')

    <!-- Row -->
    <div class="row">
            <!-- Box -->
            <div class="d-flex align-items-center justify-content-between mb-4 px-4 bg-primary text-white">

                <!-- Titulo + Mail -->
                <div class="d-flex flex-column justify-content-start">
                    <h1 class="h3 mb-0">$student->name</h1>
                    <p>$student->email</p> 
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
    <div class="row">

        <!-- Ficha Dual-->
        <div class="d-flex flex-column justify-content-start">
            <h1 class="h3 mb-0">Ficha Dual</h1>
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
    <div class="row">

        <!-- Diario de Aprendizaje -->
        <div class="col-4">
            <a href="#" class="btn btn-primary">Diario de Aprendizaje</a> <!-- TODO añadir enlace -->
        </div>

        <!-- Diario de Seguimiento -->
        <div class="col-4">
            <a href="#" class="btn btn-primary">Diario de Seguimiento</a> <!-- TODO añadir enlace -->
        </div>

        <!-- Evaluación -->
        <div class="col-4">
            <a href="#" class="btn btn-primary">Evaluación</a> <!-- TODO añadir enlace -->
        </div>
    </div>
    <!-- End Row -->

    <a href="{{ route('students.index') }}">Volver</a>
@endsection