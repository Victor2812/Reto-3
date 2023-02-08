@extends('layouts.app')

@section('title', "Evaluación Diario | $student->name $student->surname")

@section('main')

    <!-- Breadcrumbs -->
    

    <!-- Row -->
    <div class="row bg-white shadow mx-2 gx-0">

        <!-- Titulo -->
        <div class="row px-4 pt-4 gx-0 mb-3">
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">
                <div>
                    <h1 class="h3 mb-0">{{ $student->fullName() }}</h1>
                    <p class="text-uppercase">grado que esta cursando</p> <!-- meter grado -->
                    <p class="mb-0">{{ $student->email }}</p>
                    <p class="mb-0">{{ $student->phone }}</p>
                </div>
                <div>
                    <a href="{{ route('students.edit', [$student->id]) }}">
                        <button class="btn btn-secondary text-primary">
                            Editar
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Evaluación -->
        <div class="row px-4 gx-0 my-3">

            <!-- Titulo -->
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Evaluación Diario</h1>
                <a href="{{ route('diaryEvaluations.edit', [$student]) }}"><button class="btn btn-primary">Editar</button></a>
            </div>
            <!-- End Titulo -->

            <!-- Tabla -->
            <div class="row px-4  my-3">
                <div class="table-responsive-sm">
                    <table class="table table-hover border-secodary text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Indicador</th>
                                <th>Valoración</th>
                                <th class="d-none d-sm-table-cell">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>  
            </div>
            <!-- End Tabla -->
            
            <!-- Nota -->
            <div class="row px-4 my-3">
                <h5 class="h5 mb-0"><strong>Nota </strong> 0</h5>
            </div>
            <!-- End Nota -->

        </div>
        <!-- End Evaluación -->

    </div>
@endsection