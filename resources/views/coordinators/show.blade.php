@extends('layouts.app')

@section('title', "Alumno | $coordinator->name ")

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('coordinators.show', $coordinator) }}

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">
                <div>
                    <h1 class="h3 mb-0">{{ $coordinator->fullName() }}</h1>
                    <p class="text-uppercase">grado que tiene asociado</p> <!-- meter grado -->
                    <p class="mb-0">{{ $coordinator->email }}</p>
                    <p class="mb-0">{{ $coordinator->phone }}</p>
                </div>
                <div>
                    <a href="#"><button class="btn btn-secondary text-primary">Editar</button></a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->
    </div>

@endsection
