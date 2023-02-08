@extends('layouts.app')

@section('title', "Editar Evaluación Diario | $student->name $student->surname")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Evaluación -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Editar Evaluación Diario</h1>
        </div>
        <!-- End Titulo -->

        <!-- Formulario -->
        <div class="row px-4  my-3">
            <form action="#" class="requires-validation" method="POST">
                @csrf
                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Esfuerzo -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Esfuerzo y regularidad</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-esfuerzo">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Orden -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Orden, estructura y presentación</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-orden">
                                <option selected>Valoración</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Contenido</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-contenido">
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

                    <!-- Terminologia -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Terminología y Rotación</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-terminologia">
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

                    <!-- Conceptos -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Relaciona conceptos</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-conceptos">
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

                    <!-- Refelxion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Reflexión sobre el aprendizaje</h5>
                        <div class="form-group mb-2">
                            <select class="form-select" name="v-reflexion">
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