@extends('layouts.app')

@section('title', "Editar Entrada Diario | ")

@section('main')

<!-- Breadcrumbs -->


<!-- Row -->
<div class="row bg-white shadow mx-2 gx-0">

    <!-- Evaluación -->
    <div class="row px-4 gx-0 my-3">

        <!-- Titulo -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0">Nueva Entrada Diario</h1>
        </div>
        <!-- End Titulo -->

        <!-- Formulario -->
        <div class="row px-4  my-3">
            <form action="{{ route('dualSheets.diaryEntries.update', [$sheet->id, $entry->id]) }}" class="requires-validation" method="POST">
                @csrf
                @method('PUT')

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Fecha Inicio -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-outline">
                            <label for="fecha-inicio" class="h5">Fecha Inicio</label>
                            @error('start')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <input type="date" class="form-control" id="fecha-inicio" name="start" value="{{$entry->from_date}}">
                        </div>
                    </div>

                    <!-- Fecha Inicio -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="form-outline">
                            <label for="fecha-fin" class="h5">Fecha Fin</label>
                            @error('end')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <input type="date" class="form-control" id="fecha-fin" name="end" value="{{$entry->to_date}}">
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Row -->
                <div class="row mb-0 mb-md-4">

                    <!-- Actividades desarrolladas -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Actividades desarrolladas</h5>
                        <div class="form-group">
                            @error('activities')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="9" placeholder="Escribe aquí" name="activities">{{ $activity->name }}</textarea>
                        </div>
                    </div>

                    <!-- Reflexion -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Reflexión sobre el aprendizaje</h5>
                        <div class="form-group">
                            @error('reflection')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="9" placeholder="Escribe aquí" name="reflection">{{ $activity->reflection }}</textarea>
                        </div>
                    </div>

                    <!-- Identificacion de problemas -->
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <h5 class="h5 mb-2">Identificación de problemas</h5>
                        <div class="form-group">
                            @error('difficulties')
                                <strong>{{ $message }}</strong>
                            @enderror
                            <textarea class="form-control" rows="9" placeholder="Escribe aquí" name="difficulties">{{ $activity->difficulties }}</textarea>
                        </div>
                    </div>

                </div>
                <!-- End Row -->

                <!-- Submit -->
                <div class="col-12 mb-4 col-sm-4 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Añadir Entrada</button>
                </div>

        </div>
        <!-- Formulario -->

    </div>
    <!-- End Evaluación -->

</div>
@endsection
