@extends('layouts.app')

@section('title', 'Nueva Ficha Dual')

@section('main')

<!-- Breadcrumbs -->
{{ Breadcrumbs::render('dualSheets.create') }}

<div class="row bg-white shadow mx-2 gx-0">

     <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-start">
            <h1 class="h3 mb-0">Añadir Ficha Dual</h1>
        </div>
    </div>
    <!-- End Titulo -->

    <!-- Formulario -->
    <div class="row px-4 gx-sm-3 gx-0">
        <form action="" class="requires-validation" method="POST">
            @csrf

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Tutor Académico -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="tutor-academico">
                            <option selected>Tutor Académico</option>
                        </select>
                    </div>
                </div>

                <!-- Tutor Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="tutor-empresa">
                            <option selected>Tutor Empresa</option>
                        </select>
                    </div>
                </div>

                <!-- Empresa -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="empresa">
                            <option selected>Empresa</option>
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
                        <select class="form-select" name="anio">
                            <option selected>Año Académico</option>
                        </select>
                    </div>
                </div>

                <!-- Curso -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <div class="form-group">
                        <select class="form-select" name="curso">
                            <option selected>Curso</option>
                        </select>
                    </div>
                </div>

            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row mb-0 mb-sm-4">

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Añadir Ficha Dual</button>
                </div>

            </div>
            <!-- End Row -->
        </form>
    </div>
    <!-- End Formulario -->

</div>


@endsection

