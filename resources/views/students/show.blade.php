@extends('layouts.app')

@section('title', "Alumno | $student->name $student->surname")

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('students.show', $student) }}

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

        <!-- Ficha Dual -->
        <div class="row px-4 gx-0 my-3">

            <!-- Titulo -->
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 px-4">Ficha Dual</h1>
            </div>
            <!-- End Titulo -->

            <!-- Data -->
            <div class="row px-4 gx-0 my-3">
                <ul class="list-group list-group-light">
                    <li class="list-group-item"><strong>TUTOR </strong>{{ $sheet->academicTutor()->first()->fullName() }}</li>
                    <li class="list-group-item"><strong>EMPRESA </strong>{{ $sheet->company()->first()->name }}</li>
                    <li class="list-group-item"><strong>TUTOR EMPRESA </strong></li>
                    <li class="list-group-item"><strong>AÑO ACADÉMICO </strong>{{ $sheet->schoolYear()->first()->toText() }}</li>
                    <li class="list-group-item"><strong>CURSO </strong>{{ $sheet->course()->first()->name }}</li>
                </ul>         
            </div>
            <!-- End Data -->

            <!-- Botones -->
            <div class="row px-4  my-3">
                
                <div class="col-12 col-sm-3">
                    <a href="{{ route('diaryEntries.show', [$student])}}" class="btn-guapo btn-outline-primary">
                        Diario de Aprendizaje
                    </a>
                </div>

                <div class="col-12 col-sm-3">
                    <a href="#" class="btn-guapo btn-outline-primary">
                        Diario Segumiento
                    </a>
                </div>

                <div class="col-12 col-sm-3">
                    <a href="{{ route('diaryEvaluations.show', [$student])}}" class="btn-guapo btn-outline-primary">
                        Evaluación Diario
                    </a>
                </div>

                <div class="col-12 col-sm-3">
                    <a href="{{ route('companyEvaluations.show', [$student])}}" class="btn-guapo btn-outline-primary">
                        Evaluación Empresa
                    </a>
                </div>

            </div>
            <!-- End Botones -->

        </div>
        <!-- End Ficha Dual -->

    </div>
@endsection
