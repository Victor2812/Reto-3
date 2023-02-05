@extends('layouts.app')

@section('title', "Coordinador | $coordinator->name $coordinator->surname")

@section('main')

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
            <a href="#" class="d-inline-block btn btn-sm btn-secondary shadow-sm text-primary">
                Editar <!-- TODO añadir enlace -->
            </a>

        </div>
        <!-- End Box -->
    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row mb-2">

        <!-- Info Grado -->
        <div class="d-flex flex-column justify-content-start">
            <h1 class="h3 mb-3">Grado</h1>
            <p><strong>ID </strong> id grado</p> <!-- TODO añadir nombre tutor -->
            <p><strong>Nombre </strong> nombre grado</p> <!-- TODO añadir mail tutor -->
        </div>
        <!-- End Info Grado -->

    </div>
    <!-- End Row -->


    <a href="{{ route('coordinators.index') }}">Volver</a>



@endsection