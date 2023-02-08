@extends('layouts.app')

@section('title', "Seguimiento | $student->name $student->surname")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Titulo -->
    <div class="row px-4 pt-4 gx-0 mb-3">
        <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white">
            <div>
                <h1 class="h3 mb-3">{{ $student->fullName() }}</h1>
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

    <!-- Row -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 px-1 px-sm-4">Seguimiento</h1>
            <a href="{{ route('dualSheets.followUps.edit', [$sheet->id, $followUp->id]) }}" class="px-1 px-sm-4"><button class="btn btn-primary">Editar</button></a>
        </div>
        <!-- End Titulo -->

        <div class="row px-4 my-3">
            <!-- Entrada Diario -->
            <div class="row mb-0 mb-md-4">

                <!-- Data -->
                <div class="mb-4">
                    <ul class="list-group list-group-light">
                        <li class="list-group-item"><strong>FECHA </strong>{{ $followUp->meeting_date}}</li>
                        <li class="list-group-item"><strong>ASISTENTES </strong>{{ $assistants[$followUp->assistants] }}</li>
                        <li class="list-group-item"><strong>TIPO DE TUTORÍA </strong>{{ $types[$followUp->type] }}</li>
                    </ul>
                </div>

                <!-- Objetivos -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Objetivos</h4>
                    <p>{{ $followUp->objetives }}</p>
                </div>

                <!-- ASPECTOS COMENTADOS/DECISIONES TOMADAS/FUTURAS ACCIONES -->
                <div class="mb-3">
                    <h4 class="h4 mb-2">Aspectos Comentados / Decisiones Tomadas / Futuras Acciones</h4>
                    <p>{{ $followUp->commented_issues }}</p>
                </div>
        </div>

    </div>
    <!-- End Entrada Diario -->

</div>
</div>
@endsection
