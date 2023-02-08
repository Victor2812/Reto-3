@extends('layouts.app')

@section('title', "Editar Evaluación Empresa | $student->name $student->surname")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Evaluación -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Editar Evaluación Empresa</h1>
        </div>
        <!-- End Titulo -->

        <!-- Formulario -->
        <div class="row px-4  my-3">
            <form action="{{ route('companyEvaluations.update', [$evaluation->id]) }}" class="requires-validation" method="POST">
                @csrf
                @method('PUT')

                <!-- Aspectos Actitudinales -->
                <div class="row mb-0 mb-md-4">
                    <h4 class="h4 mb-0">Aspectos Actitudinales</h4>
                </div>

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- actitud -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Actitud y disposición para el trabajo</h5>
                        <div class="form-group mb-2">
                            @error('attitude_and_disposition')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="attitude_and_disposition">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->attitude_and_disposition == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('attitude_and_disposition_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="attitude_and_disposition_observation">{{ $evaluation->attitude_and_disposition_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Puntualidad -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Puntualidad</h5>
                        <div class="form-group mb-2">
                            @error('timeliness')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="timeliness">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->timeliness == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('timeliness_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="timeliness_observation">{{ $evaluation->timeliness_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Responsabilidad -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Responsabilidad</h5>
                        <div class="form-group mb-2">
                            @error('responsability')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="responsability">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->responsability == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('responsability_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="responsability_observation">{{ $evaluation->responsability_observation }}</textarea>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Aspectos Actitudinales -->
                <div class="row mb-0 mb-md-4">
                    <h4 class="h4 mb-0">Capacidades</h4>
                </div>

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Resolucion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Resolución de problemas</h5>
                        <div class="form-group mb-2">
                            @error('problem_solving_capacity')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="problem_solving_capacity">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->problem_solving_capacity == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('problem_solving_capacity_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="problem_solving_capacity_observation">{{ $evaluation->problem_solving_capacity_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Calidad -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Calidad en el trabajo</h5>
                        <div class="form-group mb-2">
                            @error('quality_at_work')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="quality_at_work">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->quality_at_work == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('quality_at_work_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="quality_at_work_observation">{{ $evaluation->quality_at_work_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Implicacion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Implicación e integración</h5>
                        <div class="form-group mb-2">
                            @error('team_involvement_and_integration')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="team_involvement_and_integration">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->team_involvement_and_integration == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('team_involvement_and_integration_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="team_involvement_and_integration_observation">{{ $evaluation->team_involvement_and_integration_observation }}</textarea>
                        </div>
                    </div>
                    
                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Toma de decisiones -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Toma de decisiones</h5>
                        <div class="form-group mb-2">
                            @error('decision_making')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="decision_making">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->decision_making == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('decision_making_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="decision_making_observation">{{ $evaluation->decision_making_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Comunicacion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Comunicación oral y escrita</h5>
                        <div class="form-group mb-2">
                            @error('oral_and_written_communication_capacity')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="oral_and_written_communication_capacity">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->oral_and_written_communication_capacity == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('oral_and_written_communication_capacity_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="oral_and_written_communication_capacity_observation">{{ $evaluation->oral_and_written_communication_capacity_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Planificacion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Planificación y organización</h5>
                        <div class="form-group mb-2">
                            @error('planning_and_organization_capacity')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="planning_and_organization_capacity">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->planning_and_organization_capacity == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('planning_and_organization_capacity_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="planning_and_organization_capacity_observation">{{ $evaluation->planning_and_organization_capacity_observation }}</textarea>
                        </div>
                    </div>
                    
                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Aprendizaje -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Aprendizaje y asimilación</h5>
                        <div class="form-group mb-2">
                            @error('capacity_for_learning_and_assimilation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <select class="form-select" name="capacity_for_learning_and_assimilation">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->capacity_for_learning_and_assimilation == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('capacity_for_learning_and_assimilation_observation')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="capacity_for_learning_and_assimilation_observation">{{ $evaluation->capacity_for_learning_and_assimilation_observation }}</textarea>
                        </div>
                    </div>
                    
                </div>
                <!-- End Row -->

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Actualizar Evaluación</button>
                </div>

        </div>
        <!-- Formulario -->

    </div>
    <!-- End Evaluación -->

</div>
@endsection