@extends('layouts.app')

@section('title', "Editar Evaluación Diario | $student->name $student->surname")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Evaluación -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Editar Evaluación Diario</h1>
        </div>
        <!-- End Titulo -->

        <!-- Formulario -->
        <div class="row px-4  my-3">
            <form action="{{ route('diaryEvaluations.update', [$evaluation->id]) }}" class="requires-validation" method="POST">
                @csrf
                @method('PUT')
                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Esfuerzo -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Esfuerzo y regularidad</h5>
                        <div class="form-group mb-2">
                            @error('effort_and_regularity')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <select class="form-select" name="effort_and_regularity">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->effort_and_regularity == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('effort_and_regularity_observation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="effort_and_regularity_observation">{{ $evaluation->effort_and_regularity_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Orden -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Orden, estructura y presentación</h5>
                        <div class="form-group mb-2">
                            @error('order_structure_presentation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <select class="form-select" name="order_structure_presentation">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->order_structure_presentation == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('order_structure_presentation_observation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="order_structure_presentation_observation">{{ $evaluation->order_structure_presentation_observation }}</textarea>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Contenido</h5>
                        <div class="form-group mb-2">
                            @error('content')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <select class="form-select" name="content">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->content == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('content_observation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="content_observation">{{ $evaluation->content_observation }}</textarea>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Terminologia -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Terminología y Rotación</h5>
                        <div class="form-group mb-2">
                            @error('terminology_and_notation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <select class="form-select" name="terminology_and_notation">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->terminology_and_notation == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('terminology_and_notation_observation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="terminology_and_notation_observation">{{ $evaluation->terminology_and_notation_observation }}</textarea>
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

                    <!-- Conceptos -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Relaciona conceptos</h5>
                        <div class="form-group mb-2">
                            @error('relates_concepts')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <select class="form-select" name="relates_concepts">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->relates_concepts == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('relates_concepts_observation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="relates_concepts_observation">{{ $evaluation->relates_concepts_observation }}</textarea>
                        </div>
                    </div>
                    
                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Refelxion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Reflexión sobre el aprendizaje</h5>
                        <div class="form-group mb-2">
                            @error('reflection_on_learning')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <select class="form-select" name="reflection_on_learning">
                                <option value="">Valoración</option>
                                @foreach ($punctuation as $name => $value)
                                    <option value="{{ $value }}" @selected($evaluation->reflection_on_learning == $value)>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('reflection_on_learning_observation')
                                <strong>{{ $message }}</strong>    
                            @enderror
                            <textarea class="form-control" rows="3" placeholder="Observaciones" name="reflection_on_learning_observation">{{ $evaluation->reflection_on_learning_observation }}</textarea>
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