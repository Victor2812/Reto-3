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
                <h1 class="h3 mb-0">Ficha Dual</h1>
            </div>
            <!-- End Titulo -->

            <!-- Data -->
            <div class="row mb-0 mt-3 mb-sm-3 mx-2 gx-0 d-flex justify-content-center">
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Curso</p>
                    <p>2</p>
                </div>

                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Tutor Académico</p>
                    <p>Rita La Pollera</p>
                </div>

                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Empresa</p>
                    <p>Funeraria Albia</p>
                </div>

                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1 text-start text-sm-center">
                    <p class="fw-bold text-uppercase mb-0">Tutor Empresa</p>
                    <p>Doctor Muertes</p>
                </div>
            </div>
            <!-- End Data -->

            <!-- Botones -->
            <div class="row mb-0 mb-sm-3 gx-0 d-flex justify-content-center">
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <button class="btn-guapo btn-outline-primary">Diario Aprendizaje</button>
                </div>
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <button class="btn-guapo btn-outline-primary">Diario Seguimiento</button>
                </div>
                <div class="col-12 mb-3 col-sm-3 mb-sm-0 px-sm-1">
                    <button class="btn-guapo btn-outline-primary">Evaluación</button>
                </div>
            </div>
            <!-- End Botones -->
        </div>
        <!-- End Ficha Dual -->

        <div>
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
    </div>

@endsection