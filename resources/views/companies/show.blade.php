@extends('layouts.app')

@section('title', "Empresa | $company->name")

@section('main')

    <!-- Row -->
    <div class="row mb-4">
        <!-- Box -->
        <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">

            <!-- Titulo + Mail -->
            <div class="d-flex flex-column justify-content-start">
                <h1 class="h3 mb-0">{{ $company->name }}</h1>
                <p class="mb-0">{{ $coordinator->CIF }}</p>
                <p class="mb-0">{{ $coordinator->location }}</p>
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

        <!-- Info Tutor -->
        <div class="d-flex flex-column justify-content-start">
            <h1 class="h3 mb-3">Contacto</h1>
            <p><strong>Nombre </strong> nombre tutor</p> <!-- TODO añadir nombre tutor -->
            <p><strong>Mail </strong> mail tutor</p> <!-- TODO añadir mail tutor -->
            <p><strong>Telefono </strong> empresa</p> <!-- TODO añadir telefono tutor -->
        </div>
        <!-- End Info Tutor -->

    </div>
    <!-- End Row -->

    <a href="{{ route('companies.index') }}">Volver</a>


@endsection
