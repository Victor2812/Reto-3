@extends('layouts.app')

@section('title', "Alumno | $student->name $student->surname")

@section('main')

    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('students.show', $student) }}

    <!-- Row -->
    <div class="row mb-4"> 
            <!-- Box -->
            <div class="d-flex align-items-center justify-content-between p-4 bg-primary text-white rounded">

                <!-- Titulo + Mail -->
                <div class="d-flex flex-column justify-content-start">
                    <h1 class="h3 mb-0">{{ $student->name }} {{ $student->surname }}</h1>
                    <p class="mb-0">{{ $student->email }}</p>
                    <p class="mb-0">{{ $student->phone }}</p> 
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

        <div class="table-responsive-sm">
            <table class="table table-hover border-secodary" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Año escolar</th>
                        <th>Tutor</th>
                        <th>Compañía</th>
                        <th>Curso</th>
                        <th>Diario</th>
                        <th>Seguimiento</th>
                        <th>Evaluación</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sheets as $sheet)
                    <tr>
                        <td>{{ $sheet->schoolYear()->first()->toText() }}</td>
                        <td>{{ $sheet->academicTutor()->first()->fullName() }}</td>
                        <td>{{ $sheet->company()->first()->name }}</td>
                        <td>{{ $sheet->course()->first()->name }}</td>

                        <!-- Ver -->
                        <td>
                            <button class="btn" href="#"><!-- TODO enlace -->
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>

                        <!-- Editar -->
                        <td> 
                            <button class="btn" href="#"><!-- TODO enlace -->
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>

                        <!-- Eliminar -->
                        <td>
                            <button class="btn"> <!-- TODO enlace -->
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- End Row -->

    <a href="{{ route('students.index') }}">Volver</a>
@endsection