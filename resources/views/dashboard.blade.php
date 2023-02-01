@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')
    <!-- Titulo -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de control</h1>
    </div>

    <!-- Row -->
    <div class="row">

        <!-- Alumnos -->
        <a href="#" class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center text-primary shadow h-100 py-2">
                <div class="card-body">
                    <h2>
                        <i class="bi bi-search"></i>
                    </h2>
                    <div class="row no-gutters align-items-center">
                        <div class="col auto">
                            <h5>Alumnos</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- Empresas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center text-primary shadow h-100 py-2">
                <div class="card-body">
                    <h2>
                        <i class="bi bi-search"></i>
                    </h2>
                    <div class="row no-gutters align-items-center">
                        <div class="col auto">
                            <h5>Empresas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tutores -->
        <a href="{{ route('tutors.index')}}" class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center text-primary shadow h-100 py-2">
                <div class="card-body">
                    <h2>
                        <i class="bi bi-search"></i>
                    </h2>
                    <div class="row no-gutters align-items-center">
                        <div class="col auto">
                            <h5>Tutores</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- Coordinadores -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center text-primary shadow h-100 py-2">
                <div class="card-body">
                    <h2>
                        <i class="bi bi-search"></i>
                    </h2>
                    <div class="row no-gutters align-items-center">
                        <div class="col auto">
                            <h5>Coordinadores</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row">

        <!-- Grados -->
        <a href="#" class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center text-primary shadow h-100 py-2">
                <div class="card-body">
                    <h2>
                        <i class="bi bi-search"></i>
                    </h2>
                    <div class="row no-gutters align-items-center">
                        <div class="col auto">
                            <h5>Grados</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- Estadísticas -->
        <a href="{{ route('charts')}}" class="col-xl-3 col-md-6 mb-4">
            <div class="card text-center text-primary shadow h-100 py-2">
                <div class="card-body">
                    <h2>
                        <i class="bi bi-search"></i>
                    </h2>
                    <div class="row no-gutters align-items-center">
                        <div class="col auto">
                            <h5>Estadísticas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endsection
