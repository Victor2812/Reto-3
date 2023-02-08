@extends('layouts.app')

@section('title', "Editar Evaluación Empresa | $student->name $student->surname")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Evaluación -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Editar Evaluación Empresa</h1>
        </div>
        <!-- End Titulo -->

        <!-- Formulario -->
        <div class="row px-4  my-3">
            <form action="#" class="requires-validation" method="POST">
                @csrf

                <!-- Aspectos Actitudinales -->
                <div class="row mb-0 mb-md-4">
                    <h4 class="h4 mb-0">Aspectos Actitudinales</h4>
                </div>

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- actitud -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Actitud y disposición para el trabajo</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-actitud">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Puntualidad -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Puntualidad</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-puntualidad">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Responsabilidad -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Responsabilidad</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-responsabilidad">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Aspectos Actitudinales -->
                <div class="row mb-0 mb-md-4">
                    <h4 class="h4 mb-0">Capacidades</h4>
                </div>

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Resolucion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Resolución de problemas</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-resolucion">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Calidad -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Calidad en el trabajo</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-calidad">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Implicacion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Implicación e integración</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-implicacion">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                    
                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Toma de decisiones -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Toma de decisiones</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-decisiones">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Comunicacion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Comunicación oral y escrita</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-comunicacion">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Planificacion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Planificación y organización</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-planificacion">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                    
                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Aprendizaje -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Aprendizaje y asimilación</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-aprendizaje">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                    
                </div>
                <!-- End Row -->

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Actualizar Evaluación</button>
                </div>

        </div>
        <!-- Formulario -->

    </div>
    <!-- End Evaluación -->

</div>
@endsection