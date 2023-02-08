@extends('layouts.app')

@section('title', "Editar Seguimiento | $student->name $student->surname")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Evaluación -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Editar Seguimiento</h1>
        </div>
        <!-- End Titulo -->

        <!-- Formulario -->
        <div class="row px-4  my-3">
            <form action="#" class="requires-validation" method="POST">
                @csrf

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Fecha -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-outline">
                            <label for="fecha" class="h5">Fecha Inicio</label>
                            <input type="date" class="form-control" name="fecha">
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Asistentes -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-group">
                            <select class="form-select" name="asistentes">
                                <option selected>Asistentes</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tipo de Tutoria -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-group">
                            <select class="form-select" name="tipo-tutoria">
                                <option selected>Tipo de Tutoría</option>
                            </select>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Objetivos -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Objetivos</h5>
                        <div class="form-group">
                            <textarea class="form-control" rows="6" placeholder="Escribe aquí"></textarea>
                        </div>
                    </div>

                    <!-- Aspectos comentados -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Aspectos comentados</h5>
                        <div class="form-group">
                            <textarea class="form-control" rows="6" placeholder="Escribe aquí"></textarea>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Actualizar Seguimiento</button>
                </div>

        </div>
        <!-- Formulario -->

    </div>
    <!-- End Evaluación -->

</div>
@endsection
