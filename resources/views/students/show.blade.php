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
                    <p class="mb-0">{{ $student->email }}</p>
                    <p class="mb-0">{{ $student->phone }}</p>
                </div>
                @can('update', $student)
                    <div>
                        <a href="{{ route('students.edit', [$student->id]) }}">
                            <button class="btn btn-secondary text-primary">
                                Editar
                            </button>
                        </a>
                    </div>
                @endcan
            </div>
        </div>
        <!-- End Titulo -->

        <!-- Ficha Dual -->
        <div class="row px-4 gx-0 my-3">

            @if ($sheet)
                <!-- Titulo -->
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 px-4">Ficha Dual</h1>
                </div>
                <!-- End Titulo -->
                
                <!-- Data -->
                <div class="row px-4 gx-0 my-3">
                    <ul class="list-group list-group-light">
                        <li class="list-group-item"><strong>TUTOR </strong>{{ $sheet->academicTutor->fullName() }}</li>
                        <li class="list-group-item"><strong>EMAIL TUTOR </strong>{{ $sheet->academicTutor->email}}</li>
                        <li class="list-group-item"><strong>TELÉFONO TUTOR </strong>{{ $sheet->academicTutor->phone}}</li>
                        <li class="list-group-item"><strong>EMPRESA </strong>{{ $sheet->company->name }}</li>
                        <li class="list-group-item"><strong>TUTOR EMPRESA </strong> {{ $sheet->company->person->fullName()}}</li>
                        <li class="list-group-item"><strong>EMAIL TUTOR EMPRESA </strong>{{ $sheet->company->person->email}}</li>
                        <li class="list-group-item"><strong>TELÉFONO TUTOR EMPRESA </strong>{{ $sheet->company->person->phone}}</li>
                        <li class="list-group-item"><strong>AÑO ACADÉMICO </strong>{{ $sheet->schoolYear->toText() }}</li>
                        <li class="list-group-item"><strong>CURSO </strong>{{ $sheet->course->toText() }}</li>
                    </ul>
                </div>
                <!-- End Data -->

                <!-- Botones -->
                <div class="row px-4 my-3 gx-0 gx-sm-3">

                    <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                        <a href="{{ route('dualSheets.diaryEntries.index', [$sheet->id])}}" class="btn-guapo btn-outline-primary">
                            Diario de Aprendizaje
                        </a>
                    </div>

                    @can('viewFollowUps', $sheet)
                        <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                            <a href="{{ route('dualSheets.followUps.index', [$sheet->id])}}" class="btn-guapo btn-outline-primary">
                                Diario Segumiento
                            </a>
                        </div>
                    @endcan

                    <div class="col-12 col-sm-3">
                        <a href="{{ route('diaryEvaluations.show', [$sheet->diaryEvaluation->id])}}" class="btn-guapo btn-outline-primary">
                            Evaluación Diario
                        </a>
                    </div>

                    <div class="col-12 col-sm-3">
                        <a href="{{ route('companyEvaluations.show', [$sheet->jobEvaluation->id])}}" class="btn-guapo btn-outline-primary">
                            Evaluación Empresa
                        </a>
                    </div>

                </div>
                <!-- End Botones -->
            @endif

        </div>
        <!-- End Ficha Dual -->

    </div>
@endsection
