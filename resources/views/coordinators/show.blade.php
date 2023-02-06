@extends('layouts.app')

@section('title', "Alumno | $coordinator->name ")

@section('main')

<<<<<<< HEAD
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('coordinators.show', $coordinator) }}
=======
<!-- Breadcrumbs -->
{{ Breadcrumbs::render('coordinators.show', $coordinator) }}

<!-- Row -->
<div class="row mb-4">
        <!-- Box -->
        <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">

            <!-- Titulo + Mail -->
            <div class="d-flex flex-column justify-content-start">
                <h1 class="h3 mb-0">{{ $coordinator->name }} {{ $coordinator->surname }}</h1>
                <p class="mb-0">{{ $coordinator->email }}</p>
                <p class="mb-0">{{ $coordinator->phone }}</p>  
            </div>
            
            <!-- Boton Editar -->
            <a href="{{ route('coordinators.edit', [$coordinator->id]) }}" class="d-inline-block btn btn-sm btn-secondary shadow-sm text-primary">
                Editar 
            </a>

        </div>
        <!-- End Box -->
    </div>
    <!-- End Row -->
>>>>>>> views-v

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
