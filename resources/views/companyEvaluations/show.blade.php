@extends('layouts.app')

@section('title', "Evaluación Empresa | $student->name $student->surname")

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
                <h1 class="h3 mb-0">Evaluación Empresa</h1>

                @can('update', $evaluation)
                    <a href="{{ route('companyEvaluations.edit', [$evaluation->id]) }}"><button class="btn btn-primary">Editar</button></a>
                @endcan
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
                            <tr>
                                <td>Actitud y disposición para el trabajo</td>
                                <td>{{ $evaluation->attitude_and_disposition }}</td>
                                <td>{{ $evaluation->attitude_and_disposition_observation }}</td>
                            </tr>
                            <tr>
                                <td>Puntualidad</td>
                                <td>{{ $evaluation->timeliness }}</td>
                                <td>{{ $evaluation->timeliness_observation }}</td>
                            </tr>
                            <tr>
                                <td>Responsabilidad</td>
                                <td>{{ $evaluation->responsability }}</td>
                                <td>{{ $evaluation->responsability_observation }}</td>
                            </tr>
                            <tr>
                                <td>Capacidad de resolución de problemas</td>
                                <td>{{ $evaluation->problem_solving_capacity }}</td>
                                <td>{{ $evaluation->problem_solving_capacity_observation }}</td>
                            </tr>
                            <tr>
                                <td>Calidad en el trabajo</td>
                                <td>{{ $evaluation->quality_at_work }}</td>
                                <td>{{ $evaluation->quality_at_work_observation }}</td>
                            </tr>
                            <tr>
                                <td>Implicación e integración en el equipo</td>
                                <td>{{ $evaluation->team_involvement_and_integration }}</td>
                                <td>{{ $evaluation->team_involvement_and_integration_observation }}</td>
                            </tr>
                            <tr>
                                <td>Toma de decisiones</td>
                                <td>{{ $evaluation->decision_making }}</td>
                                <td>{{ $evaluation->decision_making_observation }}</td>
                            </tr>
                            <tr>
                                <td>Capacidad de comunicación oral y escrita</td>
                                <td>{{ $evaluation->oral_and_written_communication_capacity }}</td>
                                <td>{{ $evaluation->oral_and_written_communication_capacity_observation }}</td>
                            </tr>
                            <tr>
                                <td>Capacidad de planificación y organización</td>
                                <td>{{ $evaluation->planning_and_organization_capacity }}</td>
                                <td>{{ $evaluation->planning_and_organization_capacity_observation }}</td>
                            </tr>
                            <tr>
                                <td>Capacidad de aprendizaje y asimilación</td>
                                <td>{{ $evaluation->capacity_for_learning_and_assimilation }}</td>
                                <td>{{ $evaluation->capacity_for_learning_and_assimilation_observation }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
            <!-- End Tabla -->
            
            <!-- Nota -->
            <div class="row px-4 my-3">
                <h5 class="h5 mb-0"><strong>Nota </strong> {{ $average }}</h5>
            </div>
            <!-- End Nota -->

        </div>
        <!-- End Evaluación -->

    </div>
@endsection