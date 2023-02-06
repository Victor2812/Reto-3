@extends('layouts.app')

@section('title', "Diario | Nombre y Apellidos ")

@section('main')
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('diaries.index') }}

<!-- Row -->
<div class="row mb-4">
       

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">
                <div>
                    <h1 class="h3 mb-0">Nombre</h1> <!-- meter nombre y apellidos -->
                    <p class="text-uppercase">grado</p> <!-- meter grado -->
                    <p class="mb-0">mail@example.com</p> <!-- meter mail -->
                    <p class="mb-0">666 666 666</p> <!-- meter telefono -->
                </div>
                <div>
                    <a href="#"><button class="btn btn-secondary text-primary">Editar</button></a>
                </div>
            </div>
        </div>

        <!-- Tabla Fechas Diario -->
        <div class="row px-4 gx-0 my-3">

            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mb-0">Diario Aprendizaje</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>13/10/21</td>
                            <!-- Ver -->
                            <td>
                                <a href="#">
                                    <button class="btn">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </a>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Tabla Fechas Diario -->

    </div>
</div>

@endsection